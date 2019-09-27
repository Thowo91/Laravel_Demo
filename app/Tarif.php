<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $guarded = [];

    public function provider() {
        return $this->belongsTo('App\Provider');
    }

    public function articles() {
        return $this->belongsToMany('App\Article');
    }

    public function getStatusBadgeAttribute() {

        $status = [
            '0' => 'Inactive',
            '1' => 'Active',
        ];

        $state = ($this->attributes['status']) ? 'badge-success' : 'badge-danger';

        $html = '<div class="badge ' . $state . '">' . $status[$this->attributes['status']] . '</div>';

        return $html;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query) {
        return $query->where('tarifs.status', '=', 1);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive(Builder $query) {
        return $query->where('tarifs.status', '=', 0);
    }
}
