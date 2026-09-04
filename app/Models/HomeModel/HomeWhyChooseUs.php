<?php

namespace App\Models\HomeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWhyChooseUs extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'home_why_choose_us';

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'icon',
        'description',
    ];

    // Optional: If you want to disable timestamps (created_at, updated_at)
    // public $timestamps = false;
}
