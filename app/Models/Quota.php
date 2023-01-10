<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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

    /** @return Quota|null */
    public static function get_first_open()
    {
        return Quota::where('status', 'open')->first();
    }

    /** @return Collection<Quota> */
    public static function get_all_open()
    {
        return Quota::where('status', 'open')->get();
    }

    public static function stats()
    {
        $quota = self::get_first_open();
        if (! $quota) {
            return null;
        }
        $result = ['total' => 0, 'remaining' => 0, 'filled' => 0];
        $result['name'] = $quota->name;
        $result['total'] = $quota->quota;
        $result['filled'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->count();
        $result['remaining'] = $result['total'] - $result['filled'];
        $result['percent'] = $result['filled'] / $result['total'] * 100;
        $result['remaining_days'] = $quota->remaining_days;

        return $result;
    }

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
