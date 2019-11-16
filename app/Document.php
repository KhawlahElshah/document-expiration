<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeNotExpired($query)
    {
        return $query->whereDate('expiry_date', '>=', today());
    }

    public function scopeWarned($query)
    {
        return $query->whereHas('reminders', function (Builder $query) {
            $query->where('notification_date', '<=', today());
        })->notExpired();
    }

    public function scopeActive($query)
    {
        return $query->whereDate('expiry_date', '>', today())
            ->whereNotBetween('expiry_date', [today(), today()->addDays(30)]);
    }

    public function saveReminder($number_of_days_notify_before)
    {
        $this->reminders()->create(['notification_date' => Carbon::create($this->expiry_date)->subDays($number_of_days_notify_before)]);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}