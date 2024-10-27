<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = "service_category";
    protected $fillable = ['cat_title', 'cat_desc', 'cat_slug'];

    public function mainServices()
    {
        return $this->hasMany(MainService::class);
    }
    public function reviews()
    {
        return $this->hasMany(ServiceReview::class, 'category_id');
    }
}
