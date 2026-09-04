<?php

namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
