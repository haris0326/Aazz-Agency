<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyClient extends Model
{
    use HasFactory;

    protected $table = 'clients';
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
