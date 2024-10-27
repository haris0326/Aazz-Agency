<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'client_id',
        'company_name',
        'website',
        'budget',
        'main_service_id',
        'comment',
    ];

    /**
     * Get the user that owns the company.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(MyClient::class, 'client_id');
    }

    /**
     * Get the main service associated with the company.
     */
    public function mainService(): BelongsTo
    {
        return $this->belongsTo(MainService::class);
    }
}
