<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    
    protected $fillable=['title','slug','appraisalyear','starting','ending','user_id'];

    protected $dates=['starting','ending'];

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
    public function appraisalscores(){
        return $this->hasMany(Appraisalscore::class);
    }

    public function appraisalreports(){
        return $this->hasMany(Appraisalreport::class);
    }
}
