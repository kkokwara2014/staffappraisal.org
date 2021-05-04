<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    
    protected $fillable=['title','slug','starting','ending','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function trainings(){
        return $this->hasMany(Training::class);
    }

    public function appraisalusers(){
        return $this->hasMany(Appraisaluser::class);
    }

    public function uploadedfiles(){
        return $this->hasMany(Uploadedfile::class);
    }
}
