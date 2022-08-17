<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_bride',
        'seating_id',
    ];

    protected $appends = [
        'group_name'
    ];

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function seating()
    {
        return $this->belongsTo(Seating::class);
    }

    public function getGroupNameAttribute()
    {
        $prefix = '[Groom]';

        if ($this->is_bride) {
            $prefix = '[Bride]';
        }

        return $prefix . ' ' . $this->name;
    }
}
