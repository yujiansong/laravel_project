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

//Route::get('/task', 'TaskController@home');

//Route::get('/create', 'TaskController@create');

//Route::get('/store', 'TaskController@store');

//Route::resource('post', 'PostController');

/*
Route::get('task/{id}', function ($id) {
    $task = \App\Models\Task::findOrFail($id);
});
*/

//隐式绑定
/*
Route::get('task/{task}', function (\App\Models\Task $task) {
    dd($task);
});
*/

//显示绑定
/*
Route::get('task/model/{task_model}', function (\App\Models\Task $task) {
   dd($task);
});
*/

//兜底路由
/*
Route::fallback(function () {
    return '我是最后的屏障';
});
*/

/*
//频率限制 1分钟访问6次
Route::middleware('throttle:6, 1')->group(function () {
    Route::get('/user', function () {
        return 'hello,yujiansong,goodluck!';
    });
});
*/

/*
//通过模型属性来动态设置频率
Route::middleware('throttle:rate_limit, 1')->group(function () {
    Route::get('/user', function () {
       //在user模型中设置自定义的 rate_limit属性值
    });
    Route::get('/post', function () {
        //在post模型中设置自定义的 rate_limit 属性值
    });
});
*/

/*
Route::get('task/{id}/delete', function ($id) {
    return '<form method="post" action = "' . route('task.delete', [$id]) . '">
        <input type="hidden" name="_method", value="DELETE">
        <input type="hidden" name="_token", value="' . csrf_token() . '">
        <button type="submit">删除任务</button>
        </form>';
});

Route::delete('task/{id}', function ($id) {
   return 'delete task ' . $id;
})->name('task.delete');
*/

/*
Route::get('/hellojiansong', function() {
    return 'hello,jiansong!';
});

Route::get('/goodluck', function () {
    return 'goodluck, bestjiansong!';
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/services', function() {
    return view('services');
});

Route::post('/add', function () {

});

Route::delete('/delete', function () {

});

Route::put('/put', function () {

});

Route::any('/any', function () {

});

Route::match(['post', 'get'], '/match', function () {

});

Route::get('/welcome', 'WelcomeController@index');

Route::get('/user/{id}', function ($id) {
    return '用户id:'.$id;
});

Route::get('/userid/{id?}', function ($id = 1001) {
    return '用户id为: '.$id;
});

Route::get('/page/{id}', function ($id) {
    return '用户id为: '.$id;
})->where('id', '[0-9]+');

Route::get('/page/{name}', function ($name) {
   return '用户姓名为: '.$name;
})->where('name', '[A-Za-z]+');

Route::get('/page/{id}/{slug}', function ($id, $slug) {
   return 'id: '.$id.', slug: '.$slug;
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);

Route::get('/userid/{id}?', function ($id = 2019) {
    return 'id: '.$id;
})->where('id', '[0-9]+')->name('user.profile');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
       return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});

Route::prefix('api')->group(function () {
    Route::get('/', function () {
    })->name('api.index');
    Route::get('/users', function () {
        return view('users');
    })->name('api.users');
});

Route::domain('admin.blog.test')->group(function () {
    Route::get('/', function () {

    });
});

Route::domain('{account}.blog.test')->group(function () {
    Route::get('/', function ($account) {

    });
    Route::get('/users', function ($account, $id) {

    });
});
*/



//20190107
/*
Route::get('/hello', function () {
   return 'hello, jiansong, goodluck!';
});
*/

//Route::post('/', function () {});
//Route::put('/', function () {});
//Route::delete('/', function () {});
//Route::any('/', function () {}); //捕获任何请求方式的路由

//Route::match(['post', 'get'], '/', function () {}); //指定请求方式白名单数组
//Route::get('/', 'WelcomeController@index'); //处理复杂业务逻辑，控制器名+方法

/*
//路由参数
Route::get('user/{id}', function ($id) {
   return '用户id: ' . $id;
});
*/

/*
//可选的路由参数
Route::get('user/{id?}', function ($id = 2) {
    return '用户id: ' . $id;
});
*/

/*
//路由参数指定正则匹配
Route::get('page/{id?}', function ($id = 1) {
    return '当前页数: ' . $id;
})->where('id', '[0-9]+');

Route::get('page/{name?}', function ($name = 'index') {
   return '当前章节: ' . $name;
})->where('name', '[a-zA-Z]+');

Route::get('page/{id}/{slag}', function ($id, $slag) {
    return 'id: ' . $id . ', slag: ' . $slag;
})->where(['id' => '[0-9]+', 'slag' => '[a-zA-Z]+']);
*/

/*
Route::get('user/{id}', function ($id) {
    return '用户id: ' . $id;
})->name('user.profile');

Route::middleware('auth')->group(function () {
   Route::get('dashboard', function () {
       return view('dashboard');
   });
   Route::get('account', function () {
       return view('account');
   });
});
*/

/*
Route::get('/task', 'TaskController@home');
Route::get('task/create', 'TaskController@create');
Route::post('task', 'TaskController@store');

Route::resource('post', 'PostController');

Route::get('task/{id}', function ($id) {
    $task = \App\Models\Task::findOrFail($id);
});

//隐式绑定
Route::get('task/{task}', function (\App\Models\Task $task) {
    dd($task);
});
*/

/*
//兜底路由
Route::fallback(function () {
   return '我是最后的屏障';
});
*/

/*
Route::middleware('throttle:6,1')->group(function () {
    Route::get('user/{id?}', function ($id = 2) {
        return '用户id: ' . $id;
    })->where('id', '[0-9]+');

    Route::get('student/{name}', function ($name) {
       return '学生名称是: ' . $name;
    })->where('name', '[a-zA-z]+');
});
*/

/*
//php
Route::get('user/{id?}', function ($id = 1) {
   return view('user.profile', ['id' => $id]);
})->name('user.profile');

//balde
Route::get('page/{id}', function ($id) {
    return view('page.show', ['id' => $id]);
})->where('id', '[0-9]+');

//css
Route::get('page/css', function () {
    return view('page.style');
});

//testing
Route::get('page/student/{count}', function ($count) {
   return view('page.count', ['count' => $count]);
})->where('count', '[0-9]+');
*/

//20190113
/*
//php
Route::get('user/{id?}', function ($id = 1) {
    return view('user.profile', ['id' => $id]);
})->name('user.profile');

//blade
Route::get('page/{id}', function ($id) {
    return view('page.show', ['id' => $id]);
})->where('id', '[0-9]+');

//css
Route::get('page/css', function () {
    return view('page.style');
});
*/

Route::post('form', 'RequestController@form')->name('form.submit');

Route::get('show', 'RequestController@show');

Route::get('test_artisan', function () {
   $exit_code = Artisan::call('welcome:message', [
       'name' => '于建松',
       '--city' => '湘潭',
   ]);
});


Route::get('dbFacecad', 'RequestController@DbFacecad');

Route::get('dbconstructor', 'RequestController@DBConstructor');

Route::get('eloquent', 'RequestController@eloquent');

Route::get('eloquentb', 'RequestController@eloquentB');

Route::get('eloquentc', 'RequestController@eloquentC');

Route::get('eloquentd', 'RequestController@eloquentD');

Route::get('eloquente', 'RequestController@eloquentE');

Route::get('eloquentf/{id?}', 'RequestController@eloquentF');

Route::get('eloquentg/{id?}', 'RequestController@eloquentG');

Route::get('eloquenth/{id?}', 'RequestController@eloquentH');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('userinfo/{id?}', 'RequestController@userInfo');

Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'Admin\RegisterController@register');
Route::post('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::get('admin', 'AdminController@index')->name('admin.home');

Route::get('/login', 'Web\AppController@getLogin')
    ->name('login')
    ->middleware('guest');
//自定义路由
Route::get('/auth/{social}', 'Web\AuthenticationController@getSocialRedirect')->middleware('guest');
Route::get('/auth/{social}/callback', 'Web\AuthenticationController@getSocialCallback')->middleware('guest');
