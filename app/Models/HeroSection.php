<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $table = "hero_section";
    protected $fillable = ['main_title', 'main_desc', 'main_image', 'button_text', 'button_link', 'main_service_id'];

        public function MainService()
    {
        return $this->hasOne(MainService::class);
    }

}
