<?php

namespace App\Http\Controllers;

use Composer\DependencyResolver\Request;
use Propel\Generator\Model\Database;
use Symfony\Component\HttpFoundation\Response;
use Composer\Config;
use Illuminate\Routing\Controller;
//use Core\Controller;
use Helpers\Javascript_factory;
// the required libs
use Illuminate\Support\Facades\Input;
use Illuminate\Container\Container as Container;
use Illuminate\Support\Facades\App;
use ptejada\uFlex\User;
use ptejada\uFlex\Collection;

class AdminController extends Controller
{

    /**
     * @Route("/admin")
     */
    public function Index()
    {
        $user = new \Helpers\User();
        if(!$user->isSigned()) {
            $this->load_template('admin/login-form.tpl', [
                'base_url' => BASE_URL
            ]);
        }
        else {
            $this->load_template('admin/home.tpl', [
                'base_url' => BASE_URL
            ]);
        }
    }

    /**
     *
     */
    public function login()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = isset($_POST['email'])?$_POST['email']: '';
            $password = isset($_POST['password'])?$_POST['password']: '';
            $auto = isset($_POST['auto'])?$_POST['auto']: 0;  //To remember user with a cookie for autologin
            $user = new \Helpers\User();

            //Login with credentials
            $user->login($email, $password, $auto);

            //not required, just an example usage of the built-in error reporting system
            if ($user->isSigned()) {
                $this->load_template('admin/home.tpl', [
                    'base_url' => BASE_URL
                ]);
            } else {
                $this->load_template('admin/login-form.tpl', [
                    'base_url' => BASE_URL,
                    'validation_errors' => ['Wrong username or password !'],
                ]);
            }
        }
        else {
            $this->load_template('admin/login-form.tpl', [
                'base_url' => BASE_URL
            ]);
    }
    }

    /**
     *
     */
    public function register_form()
    {
        $user = new \Helpers\User();
        if (!$user->isSigned()) {
            $this->load_template('admin/register-form.tpl',[
                'base_url' => BASE_URL,
            ]);
        } else {
            $this->load_template('admin/home.tpl', [
                'base_url' => BASE_URL,
            ]);
        }
    }
    /**
     *
     */
    public function do_register()
    {
        $user = new \Helpers\User();
        $input = new Collection($_POST);
        $registered = $user->register(array(
            'Username'  => $input->Username,
            'Password'  => $input->Password,
            'Password2' => $input->Password2,
            'Email'     => $input->email,
            'groupID'   => $input->groupID,
        ),false);

        if($registered){
            $user = new \Helpers\User();
            $user->login($input->email, $input->Password, 0);
            $this->redirect(BASE_URL . 'admin', ['message' => 'User registered successfully !']);
        }else{
            //Display Errors
            foreach($user->log->getErrors() as $err){
                echo "<b>Error:</b> {$err} <br/ >";
            }
        }
    }
    /**
     *
     */
    public function logout()
    {
        $user = new \Helpers\User();
        $user->logout();
        $this->redirect(BASE_URL . 'admin');
    }

}
































