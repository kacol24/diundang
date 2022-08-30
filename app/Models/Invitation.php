<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Invitation extends Model
{
    use RevisionableTrait;

    protected $revisionForceDeleteEnabled = true;

    protected $revisionCreationsEnabled = true;

    const INVITATION_MESSAGE = 'Hi %name%! You are invited to attend our wedding which is held on October 9th, 2022. Please check this invitation card attach on this link for details. %link%';

    const WA_CTC = 'https://wa.me/62%phone%?text=%message%';

    use SoftDeletes;

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
        'title'   => 'array',
    ];

    protected $appends = [
        'full_name',
        'formatted_title',
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
        return $this->hasOne(Attendance::class)->orderBy('id', 'desc');
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
    public function scopeOrdered($query)
    {
        return $query->orderBy('name', 'asc');
    }

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
        return $this->guest_code.'.jpg';
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

    public function getFullNameAttribute()
    {
        $name = $this->name;
        if ($this->formatted_title) {
            $name = $this->formatted_title.' '.$name;
        }

        return $name;
    }

    public function getFormattedTitleAttribute()
    {
        return implode(' ', $this->title ?? []);
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
