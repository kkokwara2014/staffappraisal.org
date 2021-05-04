<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    

    protected $fillable=['user_id','ip_address','device'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
