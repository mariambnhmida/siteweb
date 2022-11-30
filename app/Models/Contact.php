<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'phone', 'sujet', 'msg'];

   // public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
