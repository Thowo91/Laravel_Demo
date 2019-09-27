<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Categorie
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categorie extends Model
{
    protected $fillable = ['name'];

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function tags() {
        return $this->morphToMany('App\Tag', 'tagable');
    }
}
