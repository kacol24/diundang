<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Comment extends Model
{
    use RevisionableTrait;

    protected $revisionForceDeleteEnabled = true;

    protected $revisionCreationsEnabled = true;

    use SoftDeletes;

    protected $fillable = [
        'is_approved',
        'invitation_id',
        'ip_address',
        'name',
        'message',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}
