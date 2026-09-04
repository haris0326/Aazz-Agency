<?php

namespace App\Models\HomeModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTabContent extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'home_tab_content';

    // Mass assignable attributes
    protected $fillable = [

        'title',
        'description',
        'order_index',
    ];
    public $timestamps = true;
}

