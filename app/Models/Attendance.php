<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'sequence_group',
        'sequence',
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public function getSerialNumberAttribute()
    {
        return $this->sequence_group.str_pad($this->sequence, 3, 0, STR_PAD_LEFT);
    }
}
