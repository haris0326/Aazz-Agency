<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
    use HasFactory;

    // Table name (agar Laravel convention follow nahi kar rahe to specify karein)
    protected $table = 'proposals';

    // Mass assignable fields
    protected $fillable = [
        'full_name',
        'company',
        'website',
        'email',
        'country_code',
        'phone',
        'budget',
        'services',
        'other_service',
        'comments',
        'agreement',
        'status',
    ];

    // Casts for specific fields
    protected $casts = [
        'services' => 'array',       // JSON field ko array me cast kare
        'agreement' => 'boolean',    // Boolean
    ];


    // Default values for attributes (status defaults to 'New Lead')
    protected $attributes = [
        'status' => 'New Lead', // Default value
    ];


    // Optional: Accessor to get full phone number
    public function getFullPhoneAttribute(): string
    {
        return $this->country_code . ' ' . $this->phone;
    }

    // Optional: Scope for budget filter
    public function scopeBudget($query, $budget)
    {
        return $query->where('budget', $budget);
    }
}
