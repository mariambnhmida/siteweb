<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gainsformateur extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'gainF' ,'gainA','user_id','formation_id','prixformation','pourcentageF','formateur_id' ,'etatG',
    ];
    public function users()
{
    return $this->belongsTo('App\Models\User','user_id','id');
}
    public function formations()
{
    return $this->belongsTo('App\Models\Formation','formation_id','id');
}
public function totales()
{
    return $this->hasMany('App\Models\Totale');
}

}

