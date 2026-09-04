<?php

namespace App\Models\HomeModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFaqSec extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'home_faq_sec';
    protected $primaryKey = 'id';

    // Allow mass assignment for the following fields
    protected $fillable = [
        'question',
        'answer',
    ];

    // If you want to customize the timestamps or other settings, you can do so here
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
