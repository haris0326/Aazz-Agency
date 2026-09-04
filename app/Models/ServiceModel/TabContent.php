<?php

namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabContent extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'tab_content';

    // Mass assignable attributes
    protected $fillable = [
        'main_service_id',
        'title',
        'description',
        'order_index',
    ];

    // Relationship with MainService
    public function mainService()
    {
        return $this->belongsTo(MainService::class, 'main_service_id', 'id');
    }
}

