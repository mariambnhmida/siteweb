<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historiqparticipationpartie extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'user_id' , 'formation_id' , 'partie_id' , 'etat',
    ];

    public function users()
    {
      return $this->belongsToMany('App\Models\User','user_id','id');
    }
public function formations()
{
    return $this->belongsToMany('App\Models\Formation','formation_id','id');
}
public function parties()
{
    return $this->belongsToMany('App\Models\Partie','partie_id','id');
}

}
