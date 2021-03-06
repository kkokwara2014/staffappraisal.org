<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploadedfile extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }
}
