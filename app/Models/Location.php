<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations'; // Specify the table name if it's not plural

    protected $fillable = ['name', 'slug']; // Mass assignable fields

    public $timestamps = false; // If you don't have timestamps in your table
}
