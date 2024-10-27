<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebPages extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'web_pages';

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'main_title',
        'main_description',
        'title',
        'description',
        'meta_title',
        'meta_description',
        'slug'
    ];

    // Optionally, specify attributes that should be hidden (e.g., timestamps)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Optionally, you can define any relationships here
}
