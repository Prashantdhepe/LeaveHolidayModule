<?php

namespace App\Services;

use App\Repositories\Interfaces\HolidayRepositoryInterface;
use App\Models\holiday;

class HolidayService
{

    public function __construct(HolidayRepositoryInterface $holidayRepository)
    {
    }

    public function getAll()
    {
        return $this->holidayRepository->all();
    }

    public function create(array $data)
    {
        return $this->holidayRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->holidayRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->holidayRepository->delete($id);
    }
}