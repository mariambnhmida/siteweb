<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achatjeton extends Model
{
    use HasFactory;

    protected $fillable =[

        'id' ,'prix' ,'user_id','abonnement_id',
    ];

public function users()
{
    return $this->belongsToMany('App\Models\User');
}
public function abonnements()
{
    return $this->belongsToMany('App\Models\Abonnement');
}
}
