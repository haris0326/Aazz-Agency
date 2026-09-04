<?php

namespace App\Models\ServiceModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceDraft extends Model
{
    use HasFactory;

    protected $table = 'service_drafts';

    protected $fillable = [
        'draft_uuid',
        'service_id',
        'form_type',
        'created_by',
        'payload',
        'last_saved_at',
    ];

    protected $casts = [
        'payload'       => 'array',
        'last_saved_at' => 'datetime',
    ];

    public function mainService()
    {
        return $this->belongsTo(MainService::class, 'service_id');
    }
}