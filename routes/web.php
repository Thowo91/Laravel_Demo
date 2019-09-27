<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use function foo\func;

Auth::routes();

Route::namespace('Frontend')
    ->name('frontend.')
    ->group( function() {

        Route::get('/', function() {
            return view('start');
        })->name('frontend');

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/manufacturer', 'ManufacturerController@index')->name('manufacturer.index');
        Route::get('/manufacturer/{manufacturer}', 'ManufacturerController@show')->name('manufacturer.show');

        Route::get('/categorie', 'CategorieController@index')->name('categorie.index');
        Route::get('/categorie/{categorie}', 'CategorieController@show')->name('categorie.show');

        Route::get('/article', 'ArticleController@index')->name('article.index');
        Route::get('/article/{article}', 'ArticleController@show')->name('article.show');

        Route::get('/search', 'SearchController@search')->name('search');

        Route::get('tag', 'TagController@index')->name('tag.index');

        Route::get('tagable/{tag}', 'TagableController@index')->name('tagable.index');
    });



Route::namespace('Backend')
    ->prefix('backend')
    ->middleware('auth')
    ->group( function() {

        Route::get('/', function () {
            return view('admin');
        })->name('backend');

        Route::get('/manufacturer/{manufacturer}/delete', 'ManufacturerController@destroy')->name('manufacturer.delete');
        Route::resource('manufacturer', 'ManufacturerController');
        Route::get('/manufacturerIndexDatatables', 'ManufacturerController@indexDatatables')->name('manufacturer.data');

        Route::get('/categorie/{categorie}/delete', 'CategorieController@destroy')->name('categorie.delete');
        Route::resource('categorie', 'CategorieController');
        Route::get('/categorieIndexDatatables', 'CategorieController@indexDatatables')->name('categorie.data');

        Route::get('/article/{article}/delete', 'ArticleController@destroy')->name('article.delete');
        Route::patch('/article/saveTarif/{article}', 'ArticleController@saveTarif')->name('article.tarif');
        Route::resource('article', 'ArticleController');
        Route::get('/articleIndexDatatables', 'ArticleController@indexDatatables')->name('article.data');

        Route::get('/tag/{tag}/delete', 'TagController@destroy')->name('tag.delete');
        Route::resource('tag', 'TagController');
        Route::get('/tagIndexDatatables', 'TagController@indexDatatables')->name('tag.data');

        Route::get('/provider/{provider}/delete', 'ProviderController@destroy')->name('provider.delete');
        Route::resource('/provider', 'ProviderController');
        Route::get('/providerIndexDatatables', 'ProviderController@indexDatatables')->name('provider.data');

        Route::get('/tarif/{tarif}/delete', 'TarifController@destroy')->name('tarif.delete');
        Route::resource('/tarif', 'TarifController');
        Route::get('/tarifIndexDatatables', 'TarifController@indexDatatables')->name('tarif.data');
    }
);

