<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    const INVITATION_MESSAGE = 'Hi %name%! You are invited to attend our wedding which is held on October 9th, 2022. Please check this invitation card attach on this link for details. %link%';

    const WA_CTC = 'https://wa.me/62%phone%?text=%message%';

    use HasFactory;

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

    protected $casts = [
        'rsvp_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public static function generateGuestCode()
    {
        $candidate = mt_rand(100000, 999999);

        if (self::where('guest_code', $candidate)->exists()) {
            return self::generateGuestCode();
        }

        return $candidate;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function seating()
    {
        return $this->belongsTo(Seating::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
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

    public function getDropdownNameAttribute()
    {
        return "[{$this->guest_code}] {$this->name} {$this->phone}";
    }

    public function getFilenameAttribute()
    {
        return $this->guest_code . '.jpg';
    }

    public function getQrInvitationPathAttribute()
    {
        return storage_path("app/public/{$this->filename}");
    }

    public function getWhatsappPhoneAttribute()
    {
        if (! $this->phone) {
            return '';
        }

        return '62'.$this->phone;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
