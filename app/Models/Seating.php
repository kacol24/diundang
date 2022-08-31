<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class Seating extends Model
{
    use RevisionableTrait;

    protected $revisionForceDeleteEnabled = true;

    protected $revisionCreationsEnabled = true;

    const PER_TABLE = 10;

    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'seatings';

    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];

    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = [
        'table_dropdown',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getPlanImageUrlAttribute()
    {
        return asset('images/'.rand(1, 5).'.jpg');
    }

    public function getQuotaAttribute()
    {
        $sumGuests = $this->invitations->sum('guests');

        $tableCount = $this->table_count;

        return $sumGuests.'/'.$tableCount * self::PER_TABLE.' ('.$tableCount.' tables)';
    }

    public function getConfirmedQuotaAttribute()
    {
        $sumGuests = $this->invitations->where('is_attending')->sum('pax');

        $tableCount = $this->confirmed_table_count;

        return $sumGuests.'/'.$tableCount * self::PER_TABLE.' ('.$tableCount.' tables)';
    }

    public function getTableCountAttribute()
    {
        $sumGuests = $this->invitations->sum('guests');

        return ceil($sumGuests / self::PER_TABLE);
    }

    public function getConfirmedTableCountAttribute()
    {
        $sumGuests = $this->invitations->where('is_attending')->sum('pax');

        return ceil($sumGuests / self::PER_TABLE);
    }

    public function getTableDropdownAttribute()
    {
        $name = $this->name;

        if ($this->nickname) {
            $name = $name.' / '.$this->nickname;
        }

        if ($this->notes) {
            $name = $name.' ('.$this->notes.')';
        }

        return $name;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
