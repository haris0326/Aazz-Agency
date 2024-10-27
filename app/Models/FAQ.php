<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faq';
    protected $fillable = ['question', 'answer', 'main_service_id'];

    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
