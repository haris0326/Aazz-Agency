<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebHeaderLink extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'web_header_links';

    // Define the primary key of the table (optional, if different from 'id')
    protected $primaryKey = 'id';

    // If you don't want to use timestamps (created_at and updated_at), set this to false
    public $timestamps = false;

    // Define the attributes that are mass assignable
    protected $fillable = ['header_links'];

    // Alternatively, you can use guarded to specify which attributes are not mass assignable
    // protected $guarded = ['id'];
}
