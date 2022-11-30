<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function scats(){
        return $this->belongsTo('App\Models\Scat','scat_id','id');
}
public function abonnement(){
    return $this->belongsTo('App\Models\Abonnement','abonnement_id','id');
}
public function cats(){
    return $this->belongsTo('App\Models\Cat','cat_id','id');
}
public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function ReviewData()
    {
    return $this->hasMany('App\Models\Note','formation_id');
    }
    public function parties()
    {
    return $this->hasMany('App\Models\Partie');
    }
    public function achatformations(){
        return $this->hasMany('App\Models\Achatformation');
    }

    public function historiqparticipationparties(){
        return $this->hasMany('App\Models\historiqparticipationpartie');
    }
    public function gainsformateurs(){
        return $this->hasMany('App\Models\Gainsformateur');
    }

    public function partie_e_s(){
        return $this->hasMany('App\Models\PartieE');
    }
}
