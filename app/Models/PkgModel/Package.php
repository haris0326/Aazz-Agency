<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = ['pkg_category_id', 'level', 'duration', 'price'];


    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }

    public function benefits()
    {
        return $this->hasMany(PackagesBenefit::class, 'package_id');
    }
}
