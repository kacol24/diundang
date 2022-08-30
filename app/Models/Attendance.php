<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'sequence_group',
        'sequence',
        'attendance_id',
        'invitation_id',
        'has_gift',
    ];

    protected $casts = [
        'has_gift' => 'boolean',
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
        return $this->sequence_group. '-' .$this->sequence;
    }

    public function getCheckinTimeAttribute()
    {
        return $this->updated_at->format('H:i:s');
    }
}
