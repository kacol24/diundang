<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seating extends Model
{
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
        'table_dropdown'
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

    public function getTableCountAttribute()
    {
        $sumGuests = $this->invitations->sum('guests');

        return ceil($sumGuests / self::PER_TABLE);
    }

    public function getTableDropdownAttribute()
    {
        $name = $this->name;

        if ($this->nickname) {
            $name = $name . ' (' . $this->nickname . ')';
        }

        return $name;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
