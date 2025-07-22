<?php

namespace App\Http\Controllers;

use App\Models\holiday;
use App\Services\HolidayService;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function __construct(protected HolidayService $service)
    {
    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => 'required',
            'date' => 'required|date',
            'holiday_type_id' => 'required|exists:holiday_types,id',
        ]);
        return $this->service->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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
        return $this->service->update($id, $request->validated()->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
