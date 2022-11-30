<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function contact(){
        return $this->hasMany('App\Models\Contact');
    }
    public function parrainages(){
        return $this->hasMany('App\Models\Parrainage');
    }
    public function achatsjetons()
{
    return $this->belongsToMany('App\Models\Achatjeton');
}
public function users_competences(){
    return $this->hasMany('App\Models\UserCompetence');
}
public function formations()
    {
        return $this->belongsToMany('App\Models\Formation');
    }

    public function ReviewData()
    {
    return $this->hasMany('App\Models\Note','user_id');
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
    public function contacta(){
        return $this->hasMany('App\Models\contacta');
    }
    public function gainsformateurs(){
        return $this->hasMany('App\Models\Gainsformateur');
    }
    public function partie_e_s(){
        return $this->hasMany('App\Models\PartieE');
    }
}
