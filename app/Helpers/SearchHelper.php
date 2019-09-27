<?php


namespace App\Helpers;


use Illuminate\Support\Arr;

class SearchHelper
{

    /**
     * @param string $manufacturer
     * @return string
     */
    public static function buildManufacturer($manufacturer)
    {
        $remove = false;

        $manufacturers = [];
        $categories = request('categorie') ?? [];
        $tags = request('tag') ?? [];
        if (request()->has('manufacturer')) {

            foreach (request('manufacturer') as $item) {
                if ($item != $manufacturer) {
                    $manufacturers[] = $item;
                } else {
                    $remove = true;
                }
            }
        }
            if($remove == false) {
                $manufacturers[] = $manufacturer;
            }

        if($manufacturer == 'all') {
            $manufacturers = [];
        }

        return route('frontend.article.index', ['manufacturer' => $manufacturers, 'categorie' => $categories, 'tag' => $tags]);
    }

    /**
     * @param string $categorie
     * @return string
     */
    public static function buildCategorie($categorie)
    {
        $remove = false;

        $categories = [];
        $manufacturers = request('manufacturer') ?? [];
        $tags = request('tag') ?? [];
        if (request()->has('categorie')) {

            foreach (request('categorie') as $item) {
                if ($item != $categorie) {
                    $categories[] = $item;
                } else {
                    $remove = true;
                }
            }
        }
        if($remove == false) {
            $categories[] = $categorie;
        }

        if($categorie == 'all') {
            $categories = [];
        }

        return route('frontend.article.index', ['manufacturer' => $manufacturers, 'categorie' => $categories, 'tag' => $tags]);
    }

    /**
     * @param string $categorie
     * @return string
     */
    public static function buildTag($tag)
    {
        $remove = false;

        $tags = [];
        $manufacturers = request('manufacturer') ?? [];
        $categories = request('categorie') ?? [];
        if (request()->has('tag')) {

            foreach (request('tag') as $item) {
                if ($item != $tag) {
                    $tags[] = $item;
                } else {
                    $remove = true;
                }
            }
        }
        if($remove == false) {
            $tags[] = $tag;
        }

        if($tag == 'all') {
            $tags = [];
        }

        return route('frontend.article.index', ['manufacturer' => $manufacturers, 'categorie' => $categories, 'tag' => $tags]);
    }

    /**
     * Return Css Classes for the Search Buttons
     * dependent of selection
     *
     * @param string $entry
     * @return string
     */
    public static function searchButtons($entry) {

        $status = '';

        $entrys = Arr::collapse(request()->all());

        if(in_array($entry, $entrys)) {
            $status = 'active';
        }

        return $status;
    }

}
