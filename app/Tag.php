<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function articles() {
        return $this->morphedByMany('App\Article', 'tagable');
    }

    public function categories() {
        return $this->morphedByMany('App\Categorie', 'tagable');
    }

    public function manufacturers() {
        return $this->morphedByMany('App\Manufacturer', 'tagable');
    }

    public function getTagBadgeAttribute() {

        return '<span class="badge badge-pill badge-info"><a href="' . route('frontend.tagable.index', $this->attributes['name']) . '" style="color: #fff;">' . $this->attributes['name'] . '</a></span>';
    }
}
