<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nim',
        'no_hp',
        'email',
        'ttl',
        'ktm',
        'transkrip',
        'sertifikat_bam',
        'sertifikat_btq'
    ];
    protected $table = 'registrasi';
    protected $hidden = ['created_at','updated_at'];
}
