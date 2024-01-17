<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficLogin extends Model
{
    use HasFactory;
    protected $table = 'traffic_login';
    protected $primaryKey = 'trafficID';
    protected $fillable = [
        'trafficID',
        'userID',
        'login',
        'logout',
    ];

    public function getUserIDfromUser2(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
