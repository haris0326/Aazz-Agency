<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'project_images';

    // Specify which columns are mass assignable
    protected $fillable = [
        'file_name',
        'alt_text',
        'caption',
        'uploaded_by',
    ];

    // Optionally, disable the automatic timestamps if needed
    public $timestamps = true;

    // Define any custom accessors or methods for additional functionality
}
