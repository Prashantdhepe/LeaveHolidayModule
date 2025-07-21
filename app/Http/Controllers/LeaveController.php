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

    public function userLeave($userId)
    {
        return response()->json($this->service->userLeave($userId));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function apply(Request $request)
    {
        $data = $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|string|max:255',
        ]);

        return $this->service->create($data);
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
            'status' => 'required|string|in:approved,rejected,pending',
        ]);

        return $this->service->update($id, $data['status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
