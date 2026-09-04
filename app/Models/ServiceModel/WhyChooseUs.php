<?php

namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    // Define the database table explicitly if it doesn't follow Laravel's default naming convention.
    protected $table = 'why_choose_us';

    // Specify the attributes that can be mass-assigned to avoid mass assignment vulnerabilities.
    protected $fillable = [
        'title',         // Title of the 'Why Choose Us' feature.
        'icon',          // Icon associated with the feature.
        'description',   // Description of the feature.
        'service_id'     // ID of the related main service.
    ];

    /**
     * Define the relationship with the MainService model.
     *
     * This assumes each 'Why Choose Us' feature belongs to a main service.
     */
    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
