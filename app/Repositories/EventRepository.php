<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Carbon\Carbon;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return Event::with('eventType')->get();
    }

    public function find($id)
    {
        return Event::with('eventType')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Event::create($data);
    }

    public function update($id, array $data)
    {
        $event = $this->find($id);
        $event->update($data);
        return $event;
    }

    public function delete($id)
    {
        $event = $this->find($id);
        return $event->delete();
    }

    public function deactivateExpiredEvents()
    {
        return Event::where('start_time', '<', Carbon::today())
            ->where('is_active', true)
            ->update(['is_active' => false]);
    }
}
