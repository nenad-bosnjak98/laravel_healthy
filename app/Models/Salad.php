<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salad extends Model
{
    use HasFactory;

    protected $table = 'salads';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
