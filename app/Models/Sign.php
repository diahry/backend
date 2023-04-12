<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'sign';
    protected $hidden = ['created_at','updated_at'];
}
