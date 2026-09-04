<?php
namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    use HasFactory;

    protected $table = "test_order";
    protected $fillable = ['title', 'description', 'step_1', 'step_2', 'step_3', 'step_4', 'images', 'main_service_id'];

    protected $casts = [
        'images' => 'array', // Automatically convert JSON to array
    ];

    public function mainService()
    {
        return $this->belongsTo(MainService::class);
    }
}
