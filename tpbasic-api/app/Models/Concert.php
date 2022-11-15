<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;
    protected $table='concerts';
    protected $fillable=['id','name','date'];
    protected $hidden=['created_at','updated_at'];
}
