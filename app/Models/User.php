<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Location;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'is_activated',
        'role',
        'firstname',
        'lastname',
        'middlename',
        'gender',
        // 'age',
        'birthplace',
        'nationality',
        'contact',
        'email',
        'birthdate',
        'municipality',
        'zipcode',
        'barangay',
        'street',
        'password',
        'idno',
        'orcr',
        'platenumber',
        'approved',
        'password',
        'show_to_dashboard'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // has many documents
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    // has many vans relationship
    public function vans()
    {
        return $this->hasMany(Van::class);
    }
    // has many location relationship
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    // has many Maintenance relationship
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
    // has many Booked relationship
    public function bookeds()
    {
        return $this->hasMany(Booked::class);
    }

    // ATTRIBUTE FOR AUTOMATED ACTION OF BIRTHDATE
    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['birthdate'])->age;
    }
}
