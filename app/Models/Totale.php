<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Totale extends Model
{
    use HasFactory;
    protected $fillable =[

        'id' ,'gainformateur' ,'gainadmin','commentaire','etat','form_id','gain_id',
    ];

    public function gainsformateurs()
    {
        return $this->belongsTo('App\Models\Gainsformateur','gain_id','id');
    }
}
