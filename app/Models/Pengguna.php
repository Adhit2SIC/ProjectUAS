<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Pengguna extends Authenticatable
{
   use Notifable;

   protected $table = 'pengguna';
   protected $fillable = [
      'nama',
      'email',
      'password',
      'peran'
   ]; 

   protected $hidden = [
      'password',
   ];

   public function pelanggan()
   {
      return $this->hasOne(Pelanggan::class, 'pengguna_id');
   }
}
