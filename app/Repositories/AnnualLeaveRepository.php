<?php

namespace App\Repositories;

use App\AnnualLeave;

class AnnualLeaveRepository
{

    // create a new annual leave
    public function createAnnualLeave($data)
    {
        return AnnualLeave::create($data);
    }

    // get a specific annual leave
    public function getAnnualLeaveById($id)
    {
        return AnnualLeave::findOrFail($id);
    }

    // get all annual leaves
    public function getAllAnnualLeaves()
    {
        return AnnualLeave::all();
    }
}
