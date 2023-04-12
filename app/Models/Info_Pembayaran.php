<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'info_pembayaran';
    protected $hidden = ['created_at','updated_at'];
}
