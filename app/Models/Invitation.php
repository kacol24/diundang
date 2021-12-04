<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    const INVITATION_MESSAGE = 'Hi %name%! You are invited to attend our wedding which is held on October 9th, 2022. Please check this invitation card attach on this link for details. %link%';

    const WA_CTC = 'https://wa.me/62%phone%?text=%message%';

    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'invitations';

    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];

    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

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
    public function seating()
    {
        return $this->belongsTo(Seating::class);
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
    public function getWhatsappLinkAttribute()
    {
        $message = str_replace(
            ['%name%', '%link%'],
            [$this->name, route('download', ['guest' => $this->guest_code])],
            self::INVITATION_MESSAGE);

        return str_replace(
            ['%phone%', '%message%'],
            [$this->phone, urlencode($message)],
            self::WA_CTC);
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
