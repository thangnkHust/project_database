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
Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => ['permission.admin']], function () {

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
        Route::get('/exam/{idSubject}', 'AjaxController@getExam');
    });

    // ============route user
    $prefix = 'user';
    $controllerName = 'user';
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

        Route::post('change-password', [
            'as' => $controllerName . '/change-password',
            'uses' => $controller.'changePassword'
        ]);

        Route::post('change-level', [
            'as' => $controllerName . '/change-level',
            'uses' => $controller.'changeLevel'
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
        ->where('exam_id', '[0-9]+')->middleware('check.login.exam');
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
    $prefix = 'contact';
    $controllerName = 'contact';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('', [
            'as' => $controllerName,
            'uses' => $controller.'index'
        ]);
        
        Route::post('feadback', [
            'as' => $controllerName . '/feadback',
            'uses' => $controller.'feadback'
        ]);
    });

    Route::group(['prefix' => 'ajax'], function (){
        Route::get('/exam/{idExam}', 'AjaxController@getExam');
    });

    // ============route login
    $prefix = 'auth';
    $controllerName = 'auth';
    Route::group(['prefix' => $prefix], function () use($controllerName){
        $controller = ucfirst($controllerName).'Controller@';

        Route::get('/login', [
            'as' => $controllerName . '/login',   
            'uses' => $controller.'login'
        ])->middleware('check.login');

        Route::post('/postlogin', [
            'as' => $controllerName . '/postlogin',   
            'uses' => $controller.'postlogin'
        ]);

        Route::get('/logout', [
            'as' => $controllerName . '/logout',   
            'uses' => $controller.'logout'
        ]);

        Route::get('/register', [
            'as' => $controllerName . '/register',
            'uses' => $controller.'register'
        ]);

        Route::post('/postRegister', [
            'as' => $controllerName . '/postRegister',   
            'uses' => $controller.'postRegister'
        ]);

        Route::get('/profile-{id}', [
            'as' => $controllerName . '/profile',
            'uses' => $controller.'profile'
        ]);

        Route::post('/postProfile', [
            'as' => $controllerName . '/postProfile',   
            'uses' => $controller.'postProfile'
        ]);

        Route::get('/pass', [
            'as' => $controllerName . '/pass',
            'uses' => $controller.'pass'
        ]);

        Route::post('/postPass', [
            'as' => $controllerName . '/postPass',   
            'uses' => $controller.'postPass'
        ]);
    });

    Route::post('/subscribe', 'SubscribeController@index')->name('subscribe');

});