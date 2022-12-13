<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupes extends Model
{
    use HasFactory;
    public $timestemps=false;
    protected $table = "groupes";
    protected $fillable = [
        'Nom_groupe',
        "Logo"
    ];

    public function formateur(){
        return $this->hasOne(Formateur::class);
       }
    public function annee_formation(){
        return $this->belongsTo(Annee_formation::class);
       }
}
