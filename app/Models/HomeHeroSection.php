<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeHeroSection extends Model
{
    use HasFactory;

    // Specify the table if it does not follow Laravel's naming convention
    protected $table = 'home_hero_section';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'title',
        'description',
        'button1_title',
        'button1_link',
        'button2_title',
        'button2_link',
    ];
}
