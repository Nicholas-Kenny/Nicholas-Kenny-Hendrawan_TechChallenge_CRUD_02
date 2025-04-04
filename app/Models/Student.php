<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gender;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    //variabel yang dapat diisi
    protected $fillable = [
        'nama_mahasiswa', 'email', 'NIM', 'nomor_telepon', 'gender_id'
    ];

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
