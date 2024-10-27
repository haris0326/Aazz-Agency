<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFeature extends Model
{
    use HasFactory;

    protected $table = "order_features";
    protected $fillable = ['feature_title', 'main_service_id'];

    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
