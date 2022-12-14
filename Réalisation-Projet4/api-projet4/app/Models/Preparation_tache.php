<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preparation_tache extends Model
{
    use HasFactory;
    protected $table='preparation_tache';
    protected $fillable=['Nom_tache','Description','Duree','Preparation_brief_id'];
}
