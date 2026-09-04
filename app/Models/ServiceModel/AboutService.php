<?php

namespace App\Models\ServiceModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutService extends Model
{
    use HasFactory;

    protected $table = 'about_services';

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'main_service_id'
    ];

    // This is optional, as timestamps are enabled by default in Eloquent
    public $timestamps = true;

    public function mainService()
    {
        return $this->belongsTo(MainService::class, 'main_service_id', 'id');
    }
}
