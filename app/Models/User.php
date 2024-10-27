<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];

    /**
     * Get the companies for the user.
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
