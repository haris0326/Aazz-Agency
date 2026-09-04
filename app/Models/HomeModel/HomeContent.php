<?php

namespace App\Models\HomeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'home_content';

    // Columns that can be mass-assigned
    protected $fillable = [
        'title',
        'description',
        'content_2',
        'content_3',
    ];

    // If timestamps are handled by the database, disable Eloquent's timestamps
    public $timestamps = true;
}
