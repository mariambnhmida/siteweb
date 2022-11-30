<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompetence extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'users_competences';
    protected $fillable =[

        'id' ,'user_id' , 'scat_id' , 'niv',
    ];
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
   }
   public function scats(){
    return $this->belongsTo('App\Models\Scat','scat_id','id');
}
}
