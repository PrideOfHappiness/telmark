<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'userID';
    public $incrementing = false;
    protected $fillable = [
        'userID',
        'nama',
        'alamat',
        'no_telp',
        'email',
        'kategori',
        'referral_code',
        'password',
        'token_reset_password',
        'locationID',
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

    public function getLocationIDfromLocation1(){
        return $this->belongsTo(User::class, 'locationID', 'locationID');
    }

    public function setUserIDforTrafficLogin(){
        return $this->hasMany(TrafficLogin::class, 'userID', 'trafficID');
    }

    public function setUserIDforKarir(){
        return $this->hasMany(Karir::class, 'userID', 'karirID');
    }

    public function setUserIDforKarirFileSubmit(){
        return $this->hasMany(SubmitFileKarir::class, 'userID', 'fileKarirID');
    }
}
