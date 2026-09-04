<?php

namespace App\Models\PkgModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackagesInquiries extends Model
{
    use HasFactory;

    protected $table = 'package_inquiries'; // Define table name

    protected $fillable = [
        'pkg_category_id',
        'pkg_id',
        'name',
        'email',
        'phone_number',
        'location',
        'website',
        'description',
    ];

    public $timestamps = true; // Ensures created_at & updated_at are managed automatically

    /**
     * Relationship with Package Category
     */
    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }

    /**
     * Relationship with Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'pkg_id'); // Corrected reference
    }
}
