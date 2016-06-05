<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model {

    protected $table = 'Continent';
    protected $primaryKey = "Id";
    protected $fillable = ['ContinentName', 'ContinentCode', 'CreatedAt', 'IsActive'];

    public function Country() {

        return $this->hasMany('App\Country', 'ContinentId');
    }

}
