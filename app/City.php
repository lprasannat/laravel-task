<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'City';
    protected $primaryKey = "Id";
    protected $fillable = ['StateId', 'CityName', 'CityCode', 'CreatedAt', 'IsActive'];

    public function State() {

        return $this->belongsTo('App\State', 'StateId');
    }

    public function likeable() {
        return $this->morphTo();
    }

}
