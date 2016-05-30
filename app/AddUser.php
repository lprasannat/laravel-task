<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddUser extends Model
{
    
   protected $table='AdminLte';
   protected $fillable=['FullName','Address','City','State','PhoneNumber','EmailId','Password'];
   public $timestamps=false;
}
