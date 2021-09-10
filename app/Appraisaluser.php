<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisaluser extends Model
{
    
    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
