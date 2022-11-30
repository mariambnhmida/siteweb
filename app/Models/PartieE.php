<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartieE extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'partie_e_s';
    protected $fillable =[

        'id' ,'user_id' , 'partie_id' , 'f_id','Etat','titrep','desc',
    ];
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
   }
   public function parties(){
    return $this->belongsTo('App\Models\Partie','partie_id','id');
   }
    public function formations()
    {
        return $this->belongsTo('App\Models\Formation','f_id','id');
    }
}
