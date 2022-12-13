<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant_preparation_brief extends Model
{
    use HasFactory;
    public $timestemps=false;
    protected $table = "apprenant_preparation_brief";
    protected $fillable = [
        'Date_affectation'
    ];
    public function apprenant(){
        return $this->belongsToMany(Apprenant::class);
       }
       public function preparation_brief(){
        return $this->belongsToMany(Preparation_brief::class);
       }

      
}
