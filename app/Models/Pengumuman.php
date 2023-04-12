<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'pengumumans';
    protected $hidden = ['created_at','updated_at'];
}
