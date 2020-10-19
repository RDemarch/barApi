<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
      'login',
      'email',
      'phone_number',
      'password',
      'avatar',
      'favorites',
      'isOwner'
    ];

    public $timestamps = false;
}
