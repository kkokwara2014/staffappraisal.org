<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_id',
        'lastname',
        'middlename',
        'firstname',
        'staffnumb',
        'email',
        'phone', 
        'password',
        'assumptiondate',
        'confirmationdate',
        'resignationdate',
        'school_id',
        'department_id',
        'isactive',
        'isretired',
        'profileupdated',
        'two_factor_code',
        'two_factor_expires_at',
        'login_at',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function appraisals(){
        return $this->hasMany(Appraisal::class);
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasAnyRole($role){
        return null !== $this->roles()->where('name',$role)->first();
    }


    public function qualifications(){
        return $this->hasMany(Qualification::class);
    }

    public function appraisalusers(){
        return $this->hasMany(Appraisaluser::class);
    }

    public function logins(){
        return $this->hasMany(Login::class);
    }
    
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function lga(){
        return $this->belongsTo(Lga::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function uploadedfiles(){
        return $this->hasMany(Uploadedfile::class);
    }

    public function creatorinfos(){
        return $this->hasMany(Creatorinfo::class);
    }

    public function institutions(){
        return $this->hasMany(Institution::class);
    }
    public function juniorqualifications(){
        return $this->hasMany(Juniorqualification::class);
    }

    public function postqualiexperiences(){
        return $this->hasMany(Postqualiexperience::class);
    }
    public function adhocperfduties(){
        return $this->hasMany(Adhocperfduty::class);
    }

    public function appraisalreports(){
        return $this->hasMany(Appraisalreport::class);
    }
    
}
