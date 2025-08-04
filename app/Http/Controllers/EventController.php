<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(protected EventService $service)
    {
    }

    public function index()
    {
        return response()->json($this->service->getAllEvents());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'event_type_id' => 'required|exists:event_types,id',
        ]);
        return response()->json($this->service->createEvent($data));
    }

    public function show($id)
    {
        return response()->json($this->service->getEvent($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'event_type_id' => 'required|exists:event_types,id',
        ]);
        return response()->json($this->service->updateEvent($id, $data));
    }

    public function destroy($id)
    {
        return response()->json($this->service->deleteEvent($id));
    }

    public function expireExpiredEvents()
    {
        return response()->json($this->service->deactivateExpiredEvents());
    }
}
