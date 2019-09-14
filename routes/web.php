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


Route::redirect('/','blog');



//rutas Cliente

Route::get('blog','Web\PageController@blog')->name('blog');
Route::get('noticias/{slug}','Web\PageController@post')->name('post');
Route::get('Departamento/{slug}','Web\PageController@departamento')->name('departamento');
Route::get('etiqueta/{slug}','Web\PageController@etiqueta')->name('etiqueta');
Route::get('archivosDepto/{id}','Web\PageController@ArchivoDepto')->name('archivosDepto');
Route::get('Todos','Web\PageController@verTodos')->name('allPosts');


Auth::routes();

Route::resource('tags','Admin\TagController');
Route::resource('categories','Admin\CategoryController');
Route::resource('posts','Admin\PostController');

Route::resource('users','Admin\UsuarioController');
Route::resource('archivos','Admin\ArchivosController');

//admin

Route::get('allPost','Admin\PostController@todos')->name('AP');

//slider interno

Route::get('moveslider/{id}','Admin\PostController@mover_a_slider')->name('moveS');

Route::get('removeslider/{id}','Admin\PostController@quitar_a_slider')->name('removeS');

Route::get('mostrarSlider','Admin\PostController@mostrar_slider')->name('mostrarS');

//slider publico


Route::get('movesliderPublico/{id}','Admin\PostController@mover_a_slider_publico')->name('moveSPublico');

Route::get('removesliderPublico/{id}','Admin\PostController@quitar_a_slider_publico')->name('removeSPublico');

Route::get('mostrarSliderPublico','Admin\PostController@mostrar_slider_publico')->name('mostrarSPublico');



//Tags borrador


Route::get('TagsBorrados','Admin\TagController@indexBorrados')->name('tagsBorrados');
Route::get('RestablecerTag{id}','Admin\TagController@RestablecerTag')->name('restablecerTag');

//categorias borrador

Route::get('DeptosBorrados','Admin\CategoryController@indexBorrados')->name('departamentosBorrados');
Route::get('RestablecerDepto{id}','Admin\CategoryController@RestablecerDepto')->name('restablecerDepto');
//Posts Borrador

Route::get('PostsBorrados','Admin\PostController@indexBorrados')->name('postsBorrados');
Route::get('RestablecerPost{id}','Admin\PostController@RestablecerPost')->name('restablecerPost');


//usuarios Borrador
Route::get('UsuariosBorrados','Admin\UsuarioController@indexBorrados')->name('usuariosBorrados');
Route::get('RestablecerUsuario{id}','Admin\UsuarioController@RestablecerUser')->name('restablecerUsuario');

Route::get('MisDatos','Admin\UsuarioController@showMisDatos')->name('Mis_Datos');


