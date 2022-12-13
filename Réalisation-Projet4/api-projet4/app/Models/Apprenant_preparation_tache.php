<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant_preparation_tache extends Model
{
    use HasFactory;
    public $timestemps=false;
    protected $table = "apprenant_preparation_tache";
    protected $fillable = [
        'Date_affectation'
    ];
    public function preparation_tache(){
        return $this->belongsToMany(Preparation_tache::class);
       }
       public function apprenant_preparation_brief(){
        return $this->belongsToMany(Apprenant_preparation_brief::class);
       }
       public function apprenant(){
        return $this->belongsToMany(Apprenant::class);
       }
}
