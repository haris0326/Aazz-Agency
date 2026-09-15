<?php

namespace App\Models\LocationModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'slug'];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    // Convenience: total cities under this country without an extra query loop
    public function citiesCount(): int
    {
        return City::whereIn('state_id', $this->states()->pluck('id'))->count();
    }
}