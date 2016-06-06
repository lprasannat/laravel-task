<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

    protected $table = 'Link';
    protected $primaryKey = "Id";
    protected $fillable = ['Name'];

    public function likeable() {
        return $this->morphTo();
    }

}
