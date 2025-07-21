<?php
namespace App\Repositories;

use App\Repositories\Interfaces\LeaveRepositoryInterface;
use App\Models\leave;

class LeaveRepository implements LeaveRepositoryInterface
{

    public function userLeave($userId)
    {
        return leave::where('user_id', $userId)->latest()->get();
    }

    public function create(array $data)
    {
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
}