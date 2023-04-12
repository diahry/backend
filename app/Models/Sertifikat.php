<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'sertifikat';
    protected $hidden = ['created_at','updated_at'];
}
