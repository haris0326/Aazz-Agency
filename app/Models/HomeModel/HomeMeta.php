<?php

namespace App\Models\HomeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMeta extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'home_meta';

    // Define the fillable attributes
    protected $fillable = [
        'meta_title',
        'meta_desc',
    ];

    // Define the timestamps as the table already has them
    public $timestamps = true;

    // Optional: If you want to use different formats for timestamps
    protected $dateFormat = 'Y-m-d H:i:s';
}
