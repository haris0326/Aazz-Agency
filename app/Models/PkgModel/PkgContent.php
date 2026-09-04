<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Model;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PkgContent extends Model
{
    use HasFactory;

    protected $table = 'pkg_content';
    protected $fillable = ['title', 'pkg_content', 'pkg_category_id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }
}
