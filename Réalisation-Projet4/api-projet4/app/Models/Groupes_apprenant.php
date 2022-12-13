<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupes_apprenant extends Model
{
    use HasFactory;
    public $timestemps=false;
    protected $table = "groupes_apprenant";
    protected $fillable = [
        "Groupe_id",
        "Apprenant_id"
    ];
    public function groupes(){
        return $this->belongsToMany(Groupes::class);
       }
       public function apprenant(){
        return $this->belongsToMany(Apprenant::class);
       }
      
}
