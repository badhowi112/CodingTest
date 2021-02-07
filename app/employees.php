<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'employees';
    protected $fillable = [
        'company_id','firstname','lastname','email','phone'
    ];
    
    public function companie(){
        return $this->belongsTo('App\companies','company_id','id');
    }
}
