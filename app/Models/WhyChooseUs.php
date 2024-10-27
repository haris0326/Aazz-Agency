<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'why_choose_us';

    // Define the fillable attributes
    protected $fillable = [
        'title',   // Update field name here
        'icon',
        'description',   // Update field name here
        'service_id'
    ];

    // Define the relationship with MainService model (if exists)
    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
