<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable =[

        'id' ,'new_id' , 'mail' , 'etat', 'user_id',
    ];
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
   }
}
