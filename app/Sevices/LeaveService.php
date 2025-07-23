<?php

namespace App\Services;

use App\Repositories\Interfaces\LeaveRepositoryInterface;
use App\Models\leave;

class LeaveService
{
    public function __construct(LeaveRepositoryInterface $leaveRepository)
    {
    }

    public function getAll()
    {
        return $this->leaveRepository->all();
    }

    public function userLeave($userId)
    {
        return $this->leaveRepository->userLeave($userId);
    }

    public function create(array $data)
    {
        return $this->leaveRepository->create($data);
    }

    public function update($id, string $status)
    {
        return $this->leaveRepository->update($id, $status);
    }

    public function delete($id)
    {
        return $this->leaveRepository->delete($id);
    }

    public function getLeaveBalance($userId)
    {
        return $this->leaveRepository->getLeaveBalance($userId);
    }
}