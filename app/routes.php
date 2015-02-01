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

//Route::group(['before' => 'logged'], function () {

    Route::get('/',['as' => 'home', function(){
        return View::make('home');
    }]);

    Route::resource('type_document','typeDocumentController');

    Route::resource('task','taskController');

    Route::resource('template','templateController');

    Route::resource('document','DocumentController');

    Route::resource('workflow','WorkflowController');

    Route::get('type',['as' => 'type', function(){
        return View::make('angular');
    }]);

    Route::get('getData', ['uses' => 'DocumentController@getTypeDocument']);


    //Tipos de Documentos
    //Route::get('type_document',['as' => 'typedocument.index', 'uses' => 'TypeDocumentController@index']);
    //Route::post('type_document',['as' => 'typedocument.action', 'uses' => 'TypeDocumentController@action']);

    //Plantillas
    //Route::get('template',['as' => 'template.index', 'uses' => 'TemplateController@index']);
    //Route::post('template',['as' => 'template.action', 'uses' => 'TemplateController@action']);

//});

