<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class todo extends Model
{
    use HasFactory;
    use softDeletes;
    public function user(){
        return $this -> belongsTo('App\Models\User');
    }
    protected $fillable = ['content','state','user_id'];
}
