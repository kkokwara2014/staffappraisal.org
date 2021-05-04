<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    
    protected $fillable=['appraisal_id','user_id','trainingtype','trainingdate','caption'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }
}
