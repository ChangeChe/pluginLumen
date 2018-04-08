<?php

require_once __DIR__.'/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

 $app->withFacades();

 $app->withEloquent();
 #加载配置文件
$app->configure('app');
$app->configure('sysset');
$app->configure('menu');
$app->configure('permission');
$app->configure('plugins');
$app->configure('plugin_menu');
$app->configure('expressfee');
$app->configure('expresscom');
$app->configure('level');
$app->configure('wechat');
/*
 * 配置日志文件为每日
 */
$app->configureMonologUsing(function(Monolog\Logger $monoLog) use ($app){
    return $monoLog->pushHandler(
        new \Monolog\Handler\RotatingFileHandler($app->storagePath().'/logs/lumen.log',5)
    );
});

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

 $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
     'admin.login'=>App\Http\Middleware\CheckAdmin::class,
 ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register('Maatwebsite\Excel\ExcelServiceProvider');
class_alias('Maatwebsite\Excel\Facades\Excel', 'Excel');
/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});
#插件路由
require "plugin.php";
$plugins = config('plugins');
foreach($plugins as $key=>$type){
    $plugins = $type['children'];
    foreach($plugins as $plugin){
        $label = $plugin['label'];
        if(!is_dir(__DIR__.'/../plugins/'.$label)) continue;
        $plu = ucfirst($label);
        $app->router->group([
            'namespace' => 'Plugins\\'.$plu.'\Http\Controllers',
        ], function ($router)use($label) {
            require __DIR__.'/../plugins/'.$label.'/routes.php';
        });
    }
}
return $app;
