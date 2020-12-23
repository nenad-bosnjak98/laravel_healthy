<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    use HasFactory;

    protected $table = 'snacks';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
