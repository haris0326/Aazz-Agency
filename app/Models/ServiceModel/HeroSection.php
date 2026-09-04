<?php

namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $table = "hero_section";
    protected $fillable = ['main_title', 'main_desc', 'button_text', 'button_link', 'main_service_id'];

    public function mainService()
    {
        return $this->belongsTo(MainService::class, 'main_service_id', 'id');
    }



}
