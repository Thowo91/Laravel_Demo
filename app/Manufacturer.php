<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Manufacturer
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Manufacturer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Manufacturer extends Model
{
    protected $fillable = ['name'];

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'tagable');
    }
}
