<?php


/**
 * Created by PhpStorm.
 * User: bahrami
 * Date: 1/9/2016
 * Time: 12:44 PM
 */
namespace App\Http\Controllers;
use Helpers\Javascript_factory;
use Composer\Config;
use Illuminate\Routing\Controller;
//use Core\Controller;
use Helpers\Javascript_factory;
use App\Models\Log;
use Helpers\Simple_sender;
use Helpers\Simple_receiver;
use Core\MysqliDb;
use Celery;
// the required libs
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container as Container;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\View as View;
use Application\Models\User;

class UserController extends Controller
{

    /**
     *
     */
    public function login()
    {
        if (!$_SESSION['user']) {
            $this->get_view()->render('user/login');
        } else {
            $this->redirect(['controller' => 'admin', 'action' => 'index']);
        }
    }

    /**
     *
     */
    public function do_login()
    {

    }

    /**
     *
     */
    public function register()
    {
        if (!App::User()) {
            $this->get_view()->render('user/register');
        } else {
            $this->redirect(['controller' => 'admin', 'action' => 'index']);
        }
    }

    /**
     *
     */
    public function do_register()
    {
        if ($_POST['email']) {
            $user = new User;
            $input_array = [
                'email' => FILTER_VALIDATE_EMAIL,
                'password1' => FILTER_SANITIZE_STRING,
                'password2' => FILTER_SANITIZE_STRING
            ];
            $input = filter_input_array(INPUT_POST, $input_array);
            if ($input['password1'] !== $input['password2']) {
                $this->get_view()->render('user/register');
                $js = Javascript_factory::create();
                $js->ajax(['url' => getBaseUrl() . "?url=Error/error_form_validation", 'type' => 'get', 'data' =>
                    ['validation_errors' => json_encode(['Two passwords should be the same .'])], 'update' => '.errorHolder', 'dataType' => 'html']);
            }
            if($input['email'] === '' || $input['password1'] === '' || $input['password2'] === '')
            {
                $this->get_view()->render('user/register');
                $js = Javascript_factory::create();
                $js->ajax(['url' => getBaseUrl() . "?url=Error/error_form_validation", 'type' => 'get', 'data' =>
                    ['validation_errors' => json_encode(['All fields should be filled .'])], 'update' => '.errorHolder', 'dataType' => 'html']);
            }
            $user->data = ['email' => $input['email'], 'password' => $input['password1']];
            $saved = $user->save();
            if($saved)
            {
                App::login($input);
                $this->redirect(['controller' => 'admin', 'action' => 'index']);
            }
            else {
                $this->get_view()->render('user/register');
                $js = Javascript_factory::create();
                $js->ajax(['url' => getBaseUrl() . "?url=Error/error_form_validation", 'type' => 'get', 'data' =>
                    ['validation_errors' => json_encode(['Can not register your information at the time .'])], 'update' => '.errorHolder', 'dataType' => 'html']);
            }
        }
    }
}




































