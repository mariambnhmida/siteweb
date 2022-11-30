<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[

        'id' ,'nom' , 'desc' , 'mots_cles','cat_id',
    ];

    public function cats(){
        return $this->belongsTo('App\Models\Cat','cat_id','id');
   }
   public function formations(){
    return $this->hasMany('App\Models\Formation');
}
public function users_competentces(){
    return $this->hasMany('App\Models\UserCompetence');
}
}
