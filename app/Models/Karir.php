<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;
    protected $table = 'karir';
    protected $primaryKey = 'karirID';
    protected $incrementing = false;
    protected $fillable = [
        'karirID',
        'namakarir',
        'artikelKarir',
        'userID',
    ];

    public function getUserIDFromUser1(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
