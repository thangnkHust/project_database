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

Route::get('/', function () {
    return view('welcome');
});

// Get route admin
$prefixAdmin = config('test.url.prefix_admin');

// group route admin
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin'], function () {

    // ============route subject
    $prefix = 'subject';
    $controllerName = 'subject';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';

        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);

        // Route::get('form/{id?}', $controller.'form')->where('id', '[0-9]+');
        Route::get('form/{id?}', [
            'as' => $controllerName . '/form',
            'uses' => $controller.'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as' => $controllerName . '/save',
            'uses' => $controller.'save'
        ]);

        // Route::get('delete/{id}', $controller.'delete')->where('id', '[0-9]+');
        Route::get('delete/{id}', [
            'as' => $controllerName. '/delete',
            'uses' => $controller. 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as' => $controllerName. '/status',
            'uses' => $controller. 'status'
        ])->where('id', '[0-9]+');
    });

    // ============route post
    $prefix = 'post';
    $controllerName = 'post';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';

        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);

        // Route::get('form/{id?}', $controller.'form')->where('id', '[0-9]+');
        Route::get('form/{id?}', [
            'as' => $controllerName . '/form',
            'uses' => $controller.'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as' => $controllerName . '/save',
            'uses' => $controller.'save'
        ]);

        // Route::get('delete/{id}', $controller.'delete')->where('id', '[0-9]+');
        Route::get('delete/{id}', [
            'as' => $controllerName. '/delete',
            'uses' => $controller. 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as' => $controllerName. '/status',
            'uses' => $controller. 'status'
        ])->where('id', '[0-9]+');
    });

    // ============route exam
    $prefix = 'exam';
    $controllerName = 'exam';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';

        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);

        // Route::get('form/{id?}', $controller.'form')->where('id', '[0-9]+');
        Route::get('form/{id?}', [
            'as' => $controllerName . '/form',
            'uses' => $controller.'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as' => $controllerName . '/save',
            'uses' => $controller.'save'
        ]);

        // Route::get('delete/{id}', $controller.'delete')->where('id', '[0-9]+');
        Route::get('delete/{id}', [
            'as' => $controllerName. '/delete',
            'uses' => $controller. 'delete'
        ])->where('id', '[0-9]+');

        Route::get('change-status-{status}/{id}', [
            'as' => $controllerName. '/status',
            'uses' => $controller. 'status'
        ])->where('id', '[0-9]+');
    });

     // ============route question
    $prefix = 'question';
    $controllerName = 'question';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';

        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);

        // Route::get('form/{id?}', $controller.'form')->where('id', '[0-9]+');
        Route::get('form/{id?}', [
            'as' => $controllerName . '/form',
            'uses' => $controller.'form'
        ])->where('id', '[0-9]+');

        Route::post('save', [
            'as' => $controllerName . '/save',
            'uses' => $controller.'save'
        ]);

        // Route::get('delete/{id}', $controller.'delete')->where('id', '[0-9]+');
        Route::get('delete/{id}', [
            'as' => $controllerName. '/delete',
            'uses' => $controller. 'delete'
        ])->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'ajax'], function (){
        Route::get('/exam/{idSubject}', 'AjaxController@getExam')->name('ajaxExam');
    });

});

// Group router front-end
Route::group(['prefix' => '/', 'namespace' => 'Web'], function () {
    
    // ============route homepage
    $prefix = '';
    $controllerName = 'home';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);
    });

    // ============route post page
    $prefix = 'post';
    $controllerName = 'post';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/{subject_name}-{subject_id}', [
            'as' => $controllerName.'/subject',
            'uses' => $controller.'index'
        ])->where('subject_name', '[0-9a-zA-Z_-]+')
        ->where('subject_id', '[0-9]+');

        Route::get('/{subject_name}-{subject_id}/{post_name}-{post_id}', [
            'as' => $controllerName.'/post',
            'uses' => $controller.'post'
        ])->where('subject_name', '[0-9a-zA-Z_-]+')
        ->where('subject_id', '[0-9]+')
        ->where('post_name', '[0-9a-zA-Z_-]+')
        ->where('post_id', '[0-9]+');
    });

    // ============route exam page
    $prefix = 'exam';
    $controllerName = 'exam';
    Route::group(['prefix' => $prefix], function () use($controllerName){

        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/{subject_name}-{subject_id}', [
            'as' => $controllerName.'/subject',
            'uses' => $controller.'index'
        ])->where('subject_name', '[0-9a-zA-Z_-]+')
        ->where('subject_id', '[0-9]+');

        Route::get('/{subject_name}-{subject_id}/{exam_name}-{exam_id}', [
            'as' => $controllerName.'/exam',
            'uses' => $controller.'exam'
        ])->where('subject_name', '[0-9a-zA-Z_-]+')
        ->where('subject_id', '[0-9]+')
        ->where('exam_name', '[0-9a-zA-Z_-]+')
        ->where('exam_id', '[0-9]+');
    });

    // ============route news page
    $controllerName = 'news';
    $controller = ucfirst($controllerName).'Controller@';
    Route::get('news', [
        'as' => $controllerName,
        'uses' => $controller.'index'
    ]);

    // ============route about page
    $controllerName = 'about';
    $controller = ucfirst($controllerName).'Controller@';
    Route::get('about', [
        'as' => $controllerName,
        'uses' => $controller.'index'
    ]);

    // ============route contact page
    $controllerName = 'contact';
    $controller = ucfirst($controllerName).'Controller@';
    Route::get('contact', [
        'as' => $controllerName,
        'uses' => $controller.'index'
    ]);


});