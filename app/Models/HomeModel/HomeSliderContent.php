<?php

namespace App\Models\HomeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSliderContent extends Model
{
    use HasFactory;


    public function getImageUrlsAttribute($value)
    {
        // Check if value is null or empty
        if (empty($value)) {
            return [];
        }

        // Decode the string if it's incorrectly encoded
        $decoded = json_decode($value, true);

        // If json_decode didn't work (it could return null in case of badly formatted JSON),
        // we'll try cleaning the string manually.
        if ($decoded === null) {
            $value = preg_replace('/\\\"/', '"', $value); // Replace \\" with "
            $decoded = json_decode($value, true);
        }

        // Return the decoded array or empty array if it's still invalid
        return $decoded ?? [];
    }

    // Define the table associated with the model
    protected $table = 'home_slider_content';

    // The attributes that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'button_label',
        'button_link',
        'image_urls',
        'sort_order',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'image_urls' => 'array',  // Automatically cast JSON field to an array
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor to clean up the image_urls field if it's stored as a string


}
