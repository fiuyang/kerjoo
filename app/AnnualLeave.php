<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnualLeave extends Model
{
    const STATUS_SUBMITTED = 'submitted';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'user_id', 'start_date', 'end_date', 'approval_date' ,'status', 'reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

