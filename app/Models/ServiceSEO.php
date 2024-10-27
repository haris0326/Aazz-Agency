<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSEO extends Model
{
    use HasFactory;

    protected $table = 'service_seo';

    protected $fillable = ['meta_title', 'meta_desc', 'meta_slug', 'main_service_id'];

    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
