<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $table = "team_members";

    // Updated $fillable array to include new fields
    protected $fillable = [
        'name',
        'bio',
        'skills',
        'image',
        'position',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'role'
    ];
}
