<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $guarded = [];

    protected $dates = [
        'notification_date',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}