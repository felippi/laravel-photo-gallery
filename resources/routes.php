<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
| Here is where all of the routes for the Photo Gallery package are registered.
|
*/

Route::get('gallery', ['as' => 'gallery', 'uses' => 'JeroenG\LaravelPhotoGallery\Controllers\GalleryController@index']);

Route::get('gallery/album/photo/create', [ 'as' => 'gallery.album.photo.create', 'uses' => 'JeroenG\LaravelPhotoGallery\Controllers\PhotosController@create']);
Route::post('gallery/album/photo/store', [ 'as' => 'gallery.album.photo.store', 'uses' => 'JeroenG\LaravelPhotoGallery\Controllers\PhotosController@store']);

Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function()
{
    Route::resource('album', 'JeroenG\LaravelPhotoGallery\Controllers\AlbumsController', ['except' =>['index']]);
    Route::resource('album.photo', 'JeroenG\LaravelPhotoGallery\Controllers\PhotosController', ['except' =>['index', 'create', 'store']]);
});