<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $guarded = [];

    public function ScopeActive($query){
        return $query->where("status",1);
    }
}
