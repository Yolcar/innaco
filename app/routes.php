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
    Route::get('task/active/new',['as'=> 'taskActivation','uses'=>'taskController@activation']);
    Route::post('task/active/{id}',['as' => 'taskActive','uses' => 'taskController@active']);

    Route::resource('template','templateController');
    Route::get('template/{id}/step',['as' => 'steps', 'uses' => 'templateController@steps']);
    Route::post('template/stepSave',['as' => 'stepsSave', 'uses' => 'templateController@stepsSave']);
    Route::get('template/active/new',['as'=> 'templateActivation','uses'=>'templateController@activation']);
    Route::post('template/active/{id}',['as' => 'templateActive','uses' => 'templateController@active']);


    Route::resource('document','documentController');
    Route::get('document/write/{id}',['as' => 'write','uses' => 'documentController@writeDocument']);


    Route::get('document/{id}/workflow',['as' => 'workflow.show', 'uses' => 'workflowController@show']);
    Route::get('document/{idDocument}/workflow/{idWorkflow}',['as' => 'workflow.action', 'uses' => 'workflowController@action']);
    Route::post('document/{idDocument}/workflows/{idWorkflow}',['as' => 'workflow.update', 'uses' => 'workflowController@update']);
    Route::get('workflow/create',['as' => 'workflow.create', 'uses' => 'workflowController@create']);
    //Route::resource('workflow','WorkflowController');

    Route::get('typedocument/active/new',['as'=> 'typedocumentActivation','uses'=>'typeDocumentController@activation']);
    Route::post('typedocument/active/{id}',['as' => 'typedocumentActive','uses' => 'typeDocumentController@active']);


   // Tipos de Documentos

    //Route::get('type_document',['as' => 'typedocument.index', 'uses' => 'TypeDocumentController@index']);
    //Route::post('type_document',['as' => 'typedocument.action', 'uses' => 'TypeDocumentController@action']);

    //Plantillas
    //Route::get('template',['as' => 'template.index', 'uses' => 'TemplateController@index']);
    //Route::post('template',['as' => 'template.action', 'uses' => 'TemplateController@action']);

});


