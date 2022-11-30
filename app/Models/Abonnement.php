<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'nom' , 'desca' , 'jeton','prix',
    ];
    public $timestamps = false;

    public function formations(){
        return $this->hasMany('App\Models\Formation');
    }
    public function achatsjetons()
{
    return $this->belongsToMany('App\Models\Achatjeton');
}
}
