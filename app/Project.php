<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Project extends Model
{
    use SoftDeletes; // project softdelete
    
    //relationships
    public function user() {
        return $this->belongsTo('App\User');
    }
}
