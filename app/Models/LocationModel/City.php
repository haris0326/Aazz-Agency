<?php

namespace App\Models\LocationModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id', 'name', 'slug', 'meta_title', 'meta_description', 'content',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->state->country ?? null;
    }
}