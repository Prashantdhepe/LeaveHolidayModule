<?php

namespace App\Services;

use App\Repositories\EventRepositoryInterface;
use App\Models\Event;

class EventService
{
    
    public function __construct(protected EventRepositoryInterface $eventRepo)
    {
    }

    public function getAllEvents()
    {
        return $this->eventRepo->all();
    }

    public function getEvent($id)
    {
        return $this->eventRepo->find($id);
    }

    public function createEvent($data)
    {
        return $this->eventRepo->create($data);
    }

    public function updateEvent($id, $data)
    {
        return $this->eventRepo->update($id, $data);
    }

    public function deleteEvent($id)
    {
        return $this->eventRepo->delete($id);
    }

    public function deactivateExpiredEvents()
    {
        return $this->eventRepo->deactivateExpiredEvents();
    }
}
