<?php
namespace App\Repositories;

use App\Repositories\Interfaces\LeaveRepositoryInterface;
use App\Models\leave;
use App\Models\leave_types;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class LeaveRepository implements LeaveRepositoryInterface
{

    public function userLeave($userId)
    {
        return leave::where('user_id', $userId)->latest()->get();
    }

    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|string|max:255',
            'leave_type_id' => 'required|exists:leave_types,id',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';        

        $leaveDays = (strtotime($data['to_date'])- strtotime($data['from_date']))/ 86400 + 1;

        $leaveType = leave_types::findOrFail($data['leave_type_id']);
        if(!$leaveType){
            throw ValidationException::withMessages(['leave_type_id' => 'Leave type not found']);
        }

        $usedLeaves = leave::where('user_id', $data['user_id'])
            ->where('leave_type_id', $data['leave_type_id'])
            ->where('status', 'approved')
            ->selectRaw('SUM(DATEDIFF(to_date, from_date) + 1) as total')
            ->value('total') ?? 0;

        $remainingLeaves = $leaveType->allowed_days - $usedLeaves;
        if($leaveDays > $remainingLeaves) {
            throw ValidationException::withMessages(['leave_days' => 'Insufficient leave balance']);
        }
        return leave::create($data);
    }

    public function update($id, string $status)
    {
        $leave = leave::findOrFail($id);
        $leave->status = $status;
        $leave->save();
        return $leave;
    }

    public function delete($id)
    {
        $leave = leave::findOrFail($id);
        $leave->delete();
        return true;
    }

    public function getLeaveBalance($userId)
    {
        $leaveTypes = leave_types::all();
        $leaveBalance = [];

        foreach ($leaveTypes as $leaveType) {
            $usedLeaves = leave::where('user_id', $userId)
                ->where('leave_type_id', $leaveType->id)
                ->where('status', 'approved')
                ->selectRaw('SUM(DATEDIFF(to_date, from_date) + 1) as total')
                ->value('total') ?? 0;

            $leaveBalance[] = [
                'leave_type' => $leaveType->name,
                'allowed_days' => $leaveType->allowed_days,
                'used_days' => $usedLeaves,
                'remaining_days' => max(0, $leaveType->allowed_days - $usedLeaves),
            ];
            
        }

        return $leaveBalance;
    }
}