<?php

namespace App\Models\PkgModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkgCatFaq extends Model
{
    use HasFactory;

    protected $table = 'pkg_cat_faq';

    protected $fillable = [
        'question',
        'answer',
        'pkg_category_id',
    ];
    
    public $timestamps = false;
    /**
     * Get the package category this FAQ belongs to.
     */
    public function category()
    {
        return $this->belongsTo(PackagesCategory::class, 'pkg_category_id');
    }
}
