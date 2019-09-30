<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['count', 'dimension', 'url'];

    public $timestamps = false;

    public function imageable() {
        return $this->morphTo();
    }
}
