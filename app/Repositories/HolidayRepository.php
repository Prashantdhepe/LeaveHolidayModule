<?php
namespace App\Repositories;

use App\Repositories\Interfaces\HolidayRepositoryInterface;
use App\Models\holiday;


class HolidayRepository implements HolidayRepositoryInterface{

    public function all(){
        return holiday::orderby('date')->get();
    }

    public function create(array $data){
        return holiday::create($data);
    }

    public function update($id, array $data){
        $holiday = holiday::findOrFail($id);
        $holiday->update($data);
        return $holiday;
    }

    public function delete($id){
        $holiday = holiday::findOrFail($id);
        $holiday->delete();
        return true;
    }
}