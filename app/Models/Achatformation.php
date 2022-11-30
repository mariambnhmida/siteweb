<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achatformation extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'prix' ,'user_id','formation_id',
    ];


public function users()
{
    return $this->belongsToMany('App\Models\User','user_id','id');
}
public function formations()
{
    return $this->belongsTo('App\Models\Formation','formation_id','id');
}

}
