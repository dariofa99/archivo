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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

   

Route::resource('/admin/users','UsersController');
/* Route::resource('/admin/users','UsersController',[
    'except'=>[       
        'index'
        ]
])
->middleware('permission:edit_usuarios'); */

Route::resource('referencias/gestion','ReferenciasController');



Route::get("referencias/tipo","ReferenciasController@indexTipo")
->middleware('permission:ver_tipos_documentales');


Route::post("referencias/tipo/store","ReferenciasController@storeTipo");
Route::post("referencias/estado/store","ReferenciasController@storeEstado");
Route::get("referencias/estado","ReferenciasController@indexEstado");
 
Route::resource('/archivos','ArchivosController');
Route::post('/archivos/{id}','ArchivosController@update');
Route::get('/archivos/{carpeta}','ArchivosController@index');
Route::get('/archivos/files/{file}','ArchivosController@get_file');

Route::resource('/carpetas','CarpetasController')
->middleware(['permission:ver_archivo','verifyFile']);

Route::get('/carpetas/{status}/{carpeta}','CarpetasController@show_subcarpetas');


Route::resource('/dependencias','DependenciasController')
->middleware(['permission:ver_dependencias']);


//
    Route::resource('/admin/permisos','PermissionsController');
    Route::resource('/admin/roles','RolesController');
    Route::get('/admin/asig','RolesController@admin')->name('roles.admin');
    Route::post('/admin/sync/permission','RolesController@syncPermissionRole');
    Route::post('/admin/get/sync/permissions','RolesController@getPermissionsRole');
    Route::post('/admin/permissions/change','RolesController@change_permissions');

});