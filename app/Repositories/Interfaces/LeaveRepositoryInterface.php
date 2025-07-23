<?php

namespace App\Repositories\Interfaces;

interface LeaveRepositoryInterface
{
    public function all();

    public function userLeave($userId);

    public function create(array $data);

    public function update($id, string $status);

    public function delete($id);

    public function getLeaveBalance($userId);
}