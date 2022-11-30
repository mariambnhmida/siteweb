<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'nom' , 'desc' , 'mots_cles',
    ];


    public $timestamps = false;
    public function scats(){
        return $this->hasMany('App\Models\Scat');
    }
    public function formations(){
        return $this->hasMany('App\Models\Formation');
    }

}
