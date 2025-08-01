<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(protected EventService $eventService)
    {
    }

    public function index()
    {
        return response()->json($this->eventService->getAllEvents());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_type_id' => 'required|exists:event_types,id',
        ]);
        return response()->json($this->eventService->createEvent($data));
    }

    public function show($id)
    {
        return response()->json($this->eventService->getEvent($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_type_id' => 'required|exists:event_types,id',
        ]);
        return response()->json($this->eventService->updateEvent($id, $data));
    }

    public function destroy($id)
    {
        return response()->json($this->eventService->deleteEvent($id));
    }

    public function expireExpiredEvents()
    {
        return response()->json($this->eventService->deactivateExpiredEvents());
    }
}
