<?php

namespace App\Http\Controllers;

use App\Models\leave;
use App\Services\LeaveService;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function __construct(protected LeaveService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function userLeave(Request $request)
    {
        $userId = $request->user()->id;
        return response()->json($this->service->userLeave($userId));
    }

    public function balanceLeave(Request $request)
    {
       
        return response()->json($this->service->getLeaveBalance($request->user()->id));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function apply(Request $request)
    {
        $leave = $this->service->create($data);
        return response()->json(['message' => 'Leave applied successfully', 'leave' => $leave]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|string|in:approved,rejected',
        ]);

        $leave = $this->service->update($id, $data['status']);
        return response()->json(['message' => 'Leave status updated successfully', 'leave' => $leave]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
