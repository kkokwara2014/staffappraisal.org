<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    
    protected $fillable=[
        'awardinginst',
        'dateofgrad',
        'qualname',
        'qualifilename',
        'appraisal_id',
        'user_id',
    ];
}
