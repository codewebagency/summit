<?php // Directory separator is set up here because separators are different on Linux and Windows operating systems 
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__));
//define('ROOT', dirname(dirname(__FILE__)));
if(PHP_SAPI === 'cli')
{
    $url = $argv[1];        
}
else {
    $url = @$_GET['url']; // can be undefined so uses default controller
}
require_once(ROOT . DS . 'vendor' . DS . 'autoload.php'); // composer autoloader
require_once(ROOT . DS . 'vendor' . DS . 'illuminate' . DS . 'support' . DS . 'helpers.php');
//require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');
$basePath = str_finish(dirname(__FILE__), '/');
$controllersDirectory = ROOT . DS . "app" . DS . "Http" . DS . "Controllers";
$modelsDirectory = ROOT . DS . "app" . DS . "models";
$helpersDirectory = ROOT . DS . "helpers";
$coreDirectory = ROOT . DS . "core";
require_once(ROOT . DS . "core" . DS . "functions.php");
// register the autoloader and add directories
Illuminate\Support\ClassLoader::addDirectories(array($controllersDirectory, $modelsDirectory, $helpersDirectory, $coreDirectory));
Twig_Autoloader::register();
Illuminate\Support\ClassLoader::register();


// Instantiate the container
$app = new Illuminate\Container\Container();
// Tell facade about the app instance
Illuminate\Support\Facades\Facade::setFacadeApplication($app);

// register app instance with container
$app['app'] = $app;

// set environment
$app['env'] = 'development';
$app['config'] = new \App\Config\Config();

with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();



// Instantiate the request
$request = Illuminate\Http\Request::createFromGlobals();
/****** create app inside the IOC ontainer ***************/
    $container = new Illuminate\Container\Container();
    Illuminate\Support\Facades\Facade::setFacadeApplication($container);
    $container->singleton('app', 'Illuminate\Container\Container');
    class_alias('Illuminate\Support\Facades\App', 'App');

require $basePath . 'routes.php';
try
{

    // dispatch the request
    $response = $app['router']->dispatch($request);
    // send the response
    $response->send();
}
catch(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $notFound)
{
    with(new \Illuminate\Http\Response('Oops! this page does not exists', 400))->send();
}
