<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    use HasFactory;

    // Table name (optional, if different from plural form of model name)
    protected $table = 'client_logos';

    // Primary key (optional, if different from 'id')
    protected $primaryKey = 'id';

    // Automatically managed timestamps (optional if you don't want to use created_at/updated_at)
    public $timestamps = true;

    // Define fillable or guarded properties for mass assignment
    protected $fillable = [
        'title',
        'description',
        'logo_image',
    ];

    // Define hidden attributes (optional, for example, if you don't want logo_image to be visible in JSON responses)
    protected $hidden = [
        'logo_image',
    ];

    // You can also define any relationships, custom methods, or other logic here
}
