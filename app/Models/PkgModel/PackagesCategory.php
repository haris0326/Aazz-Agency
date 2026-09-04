<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesCategory extends Model
{
    use HasFactory;

    protected $table = 'packages_category'; // Specify table name

    protected $fillable = ['name', 'description', 'slug']; // Mass assignable fields

    // Disable the automatic timestamps feature
    public $timestamps = false;

    /**
     * Relationship: A category has many packages.
     */
    public function packages()
    {
        return $this->hasMany(Package::class, 'pkg_category_id');
    }

    /**
     * Relationship: A category has many pricing content records.
     */
    public function contents()
    {
        return $this->hasMany(PkgContent::class, 'pkg_category_id');
    }

    /**
     * Relationship: A category has many FAQs.
     */
    public function faqs()
    {
        return $this->hasMany(PkgCatFaq::class, 'pkg_category_id');
    }

    /**
     * Relationship: A category has many meta information entries.
     */
    public function metaInfo()
    {
        return $this->hasMany(PkgMetaInfo::class, 'pkg_category_id');
    }

    /**
     * Relationship: A category has many tab contents.
     */
    public function tabContents()
    {
        return $this->hasMany(PkgTabContent::class, 'pkg_category_id');
    }

    /**
     * Convert category name to lowercase and generate slug before saving.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            $category->name = strtolower($category->name);
            $category->slug = strtolower(str_replace(' ', '-', $category->name));
        });
    }
}
