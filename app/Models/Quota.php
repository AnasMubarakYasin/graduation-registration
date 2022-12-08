<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Quota extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quota',
        'start_date',
        'end_date',
        'status',
    ];

    public function getRemainingDaysAttribute()
    {
        $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->end_date));
        return $remaining_days;
    }

    public function registrars()
    {
        return $this->hasMany(Registrar::class);
    }
}
