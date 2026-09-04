<?php

// app/Models/WebsiteSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    // Specify the table name if it is not pluralized by Laravel convention
    protected $table = 'website_settings';

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'favicon',
        'navbar_color',
        'footer_color',
        'cta_color',      // Added cta_color
        'button_color',   // Added button_color
    ];

    // Disable timestamps if you don't want to use them, since you have custom ones
    public $timestamps = false;

    // Optionally, if you want to format the created_at and updated_at
    protected $dates = ['created_at', 'updated_at'];

    // Validation rules for the form
    public static function rules($update = false)
    {
        return [
            'header_logo'  => 'required|string|max:255',
            'footer_logo'  => 'required|string|max:255',
            'favicon'      => 'nullable|string|max:255', // Validation for favicon (optional string with max length)
            'navbar_color' => 'required|string|size:7', // #RRGGBB format
            'footer_color' => 'required|string|size:7', // #RRGGBB format
            'cta_color'    => 'required|string|size:7', // #RRGGBB format for CTA color
            'button_color' => 'required|string|size:7', // #RRGGBB format for Button color
        ];
    }

}
