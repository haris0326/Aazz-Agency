<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceForm extends Model
{
    use HasFactory;

    protected $table = 'servicesform';

    protected $fillable = [
        'full_name',
        'location',
        'email',
        'website',
        'country_code',
        'phone',
        'comments',
        'page_url',
        'status',
    ];

    protected $attributes = [
        'status' => 'New Lead',
    ];

    public function getFullPhoneAttribute(): string
    {
        return trim(($this->country_code ?? '') . ' ' . ($this->phone ?? ''));
    }
}
