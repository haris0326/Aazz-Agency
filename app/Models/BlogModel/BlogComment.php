<?php

namespace App\Models\BlogModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    protected $fillable = [
        'blog_id', 'name', 'email', 'message', 'status', 'ip_address',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    /** Only comments an admin has approved — safe to show publicly. */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /** Awaiting admin review. */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /** Rejected / hidden by admin. */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}