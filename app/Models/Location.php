<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'location';
    protected $primaryKey = "locationID";
    public $incrementing = false;

    protected $fillable = [
        'locationID',
        'namaCabang',
        'alamat',
        'no_telp',
        'email',
        'url_maps',
    ];

    public function setLocationIDforUsers(){
        return $this->hasMany(User::class, 'locationID', 'userID');
    }
}
