<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    public $timestemps=false;
    protected $table = "formateur";
    protected $fillable = [
        'Nom_formateur',
        "Prenom_formateur",
        "Email_formateur",
        "Phone",
        "Adress",
        "CIN",
        "Image"
    ];

    public function groupes(){
        return $this->hasOne(Groupes::class);
       }
       public function preparationbrief(){
        return $this->hasMany(Preparation_brief::class);
       }
}
