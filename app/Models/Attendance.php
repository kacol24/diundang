<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Attendance extends Model
{
    use RevisionableTrait;
    use SoftDeletes;

    protected $revisionForceDeleteEnabled = true;

    protected $revisionCreationsEnabled = true;

    protected $fillable = [
        'sequence_group',
        'sequence',
        'attendance_id',
        'invitation_id',
        'has_gift',
        'notes',
        'extra_gifts',
    ];

    protected $casts = [
        'has_gift' => 'boolean',
        'notes'    => 'array',
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class)->withTrashed();
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }

    public function getSerialNumberAttribute()
    {
        return $this->sequence_group.$this->sequence;
    }

    public function getCheckinTimeAttribute()
    {
        return $this->updated_at->format('H:i:s');
    }

    public function getGiftCountAttribute()
    {
        return (int) $this->has_gift + $this->extra_gifts;
    }
}
