<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainService; // Ensure MainService is imported

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
    public function mainService() // Consider using camelCase for method names
    {
        return $this->hasOne(MainService::class);
    }
}

