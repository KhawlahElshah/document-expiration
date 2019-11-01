<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeExpired($query)
    {
        return $query->whereDate('expiry_date', '<=', today());
    }

    public function scopeWarned($query)
    {
        return $query->whereDate('expiry_date', '>', today()->addDays(30));
    }

    public function scopeActive($query)
    {
        return $query->whereDate('expiry_date', '>', today())
            ->whereNotBetween('expiry_date', [today(), today()->addDays(30)]);
    }

    public function saveReminder($number_of_days_notify_before)
    {
        $this->reminders()->create(['notify_before_number_days' => $number_of_days_notify_before]);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}