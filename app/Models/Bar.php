<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'adresse',
      'telephone',
      'horaire_jour',
      'reseau_sociaux',
      'photo',
      'latitude',
      'longitude'
    ];

    protected $cast = [
      'latitude' => 'double',
      'longitude' => 'double'
    ];

    public $timestamps = false;


    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_bar');
    }
}
