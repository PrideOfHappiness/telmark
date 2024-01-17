<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitFileKarir extends Model
{
    use HasFactory;
    protected $table = 'submit_file_karir';
    protected $primaryKey = 'fileKarirID';
    protected $fillable = [
        'fileKarirID',
        'namaFile',
        'userID',
    ];

    public function getUserIDfromUser3(){
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}
