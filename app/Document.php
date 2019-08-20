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
}
