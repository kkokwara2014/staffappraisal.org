<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisalreport extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }
    public function appraisalscore(){
        return $this->belongsTo(Appraisalscore::class);
    }
    public function qualification(){
        return $this->belongsTo(Qualification::class);
    }
    public function additionalqualif(){
        return $this->belongsTo(Additionalqualif::class);
    }
    public function juniorqualification(){
        return $this->belongsTo(Juniorqualification::class);
    }
    public function salaryscale(){
        return $this->belongsTo(Salaryscale::class);
    }
    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }
    public function profmembership(){
        return $this->belongsTo(Profmembership::class);
    }

}
