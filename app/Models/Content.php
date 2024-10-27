<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $fillable = ['title', 'description', 'content_2', 'content_3', 'main_service_id'];

    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
