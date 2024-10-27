<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainService extends Model
{
    use HasFactory;

    protected $table = "main_service";
    protected $fillable = ['title', 'description', 'service_cat_id'];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_cat_id');
    }

    public function heroSection()
    {
        return $this->hasOne(HeroSection::class, 'main_service_id'); // Specify the foreign key
    }


    public function testOrders()
    {
        return $this->hasMany(TestOrder::class, 'main_service_id');
    }

    public function content()
    {
        return $this->hasOne(Content::class, 'main_service_id'); // One-to-one relationship
    }

    public function orderFeatures()
    {
        return $this->hasMany(OrderFeature::class, 'main_service_id');
    }

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'main_service_id');
    }

    public function whyChooseUs()
    {
        return $this->hasMany(WhyChooseUs::class, 'service_id');
    }

   // MainService.php
   public function tabContents()
   {
       return $this->hasMany(TabContent::class, 'main_service_id')->orderBy('order_index');
   }


    public function serviceSEO()
    {
        return $this->hasOne(ServiceSEO::class, 'main_service_id'); // Ensure the correct foreign key is specified
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class, 'category_id', 'service_cat_id');  // Assuming reviews are related by category_id
    }
}
