<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //
    protected $table = 'employees';
    protected $fillable = [
        'company_id','firstname','lastname','email','phone'
    ];
    public function companies(){
        return $this->belongsTo('App\companies','id');
    }
}
