<?php

namespace App\Models\PkgModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesBenefit extends Model
{
    use HasFactory;

    protected $table = 'packages_benefits';

    protected $fillable = ['package_id', 'benefit_description'];

    public $timestamps = false;
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
