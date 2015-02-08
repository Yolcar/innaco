<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before' => 'logged'], function () {

    Route::get('/',['as' => 'home', function(){
        return View::make('home');
    }]);

    Route::resource('type_document','typeDocumentController');

    Route::resource('task','taskController');

    Route::resource('template','templateController');
    Route::get('template/{id}/step',['as' => 'steps', 'uses' => 'templateController@steps']);
    Route::post('template/stepSave',['as' => 'stepsSave', 'uses' => 'templateController@stepsSave']);


    Route::resource('document','documentController');
    Route::get('document/write/{id}',['as' => 'write','uses' => 'documentController@writeDocument']);
    Route::resource('workflow','WorkflowController');


    Route::get('prueba',['as' => 'prueba', 'uses' => 'pruebaController@index']);


    //Tipos de Documentos
    //Route::get('type_document',['as' => 'typedocument.index', 'uses' => 'TypeDocumentController@index']);
    //Route::post('type_document',['as' => 'typedocument.action', 'uses' => 'TypeDocumentController@action']);

    //Plantillas
    //Route::get('template',['as' => 'template.index', 'uses' => 'TemplateController@index']);
    //Route::post('template',['as' => 'template.action', 'uses' => 'TemplateController@action']);

});


