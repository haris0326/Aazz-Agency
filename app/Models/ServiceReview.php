<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    use HasFactory;

    // Table name in the database
    protected $table = 'service_reviews';

    // Specify the primary key for the model (if different from 'id')
    protected $primaryKey = 'id';

    // Disable timestamps if you don't want Eloquent to automatically manage them
    public $timestamps = true;

    // Fields that can be mass-assigned
    protected $fillable = [
        'title',
        'description',
        'user_name',
        'user_image',
        'rating',
        'review_text',
        'category_id',
    ];

    // Fields that should be cast to specific types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    // Define the relationship with the service_category table
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    // Validation rules for the model
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'user_name' => 'required|string|max:255',
        'user_image' => 'nullable|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'review_text' => 'nullable|string',
        'category_id' => 'nullable|exists:service_category,id',
    ];
}
