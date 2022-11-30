<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[

        'id' ,'user_id' , 'nom' , 'descp', 'formation_id','gratuite','video','etatp'
    ];
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function formations(){
        return $this->belongsTo('App\Models\Formation','formation_id','id');
    }
    public function historiqparticipationparties(){
        return $this->hasMany('App\Models\historiqparticipationpartie');
    }

    public function partie_e_s(){
        return $this->hasMany('App\Models\PartieE');
    }

}
