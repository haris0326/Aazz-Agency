<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tech_technologies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type_id', 'icon_type', 'icon_svg', 'icon_image'];

    /**
     * Get the type associated with the technology.
     */
    public function type()
    {
        return $this->belongsTo(TechType::class, 'type_id');
    }
}
