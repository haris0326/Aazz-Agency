<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Model;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PkgTabContent extends Model
{
    use HasFactory;

    protected $table = 'pkg_tab_content';
    protected $fillable = ['tab_title', 'tab_content', 'pkg_category_id'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }
}
