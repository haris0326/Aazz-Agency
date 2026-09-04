<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Model;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PkgMetaInfo extends Model
{
    use HasFactory;

    protected $table = 'pkg_meta_info';
    protected $fillable = ['page_name', 'meta_title', 'meta_description', 'meta_keywords', 'slug', 'pkg_category_id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }
}
