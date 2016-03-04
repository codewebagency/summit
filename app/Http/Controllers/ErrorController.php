<?php
namespace App\Http\Controllers;

use Composer\Config;
use Helpers\CelerySingleton;
use Illuminate\Routing\Controller;
//use Core\Controller;
use Helpers\Javascript_factory;
//use Database\Models\Log;
use Celery;
// the required libs
use Illuminate\Support\Facades\Input;
use Illuminate\Container\Container as Container;
use Illuminate\Support\Facades\App;
use Propel\Runtime\Propel;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Base\ServerQuery;
use Base\LogQuery;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author hossein
 */
class ErrorController extends Controller {

    /**
     * 
     * @param type $path_info contains a JSON regarding controller and its action names
     */
    public function error_404($path_info) {
        $path_info = json_decode($path_info);
        $controller = $path_info[0];
        $action = $path_info[1];
        $this->get_view()->set('items', array('controller' => $controller, 'action' => $action));
        $this->get_view()->render('error/error_404');
    }

    /**
     * 
     * @param String $url JSON
     */
    public function error_url_invalid() {
        if ($this->is_ajax()) {
            $url = $_GET['invalidUrl'];
            $this->get_view()->set('items', array('url' => $url));
            $this->get_view()->render('error/error_url_invalid');
        }
    }
    /**
     * 
     */
    public function error_form_validation()
    {
            $validation_errors = $_GET['validation_errors'];
            $this->load_template('error/error_form_validation', [
                'base_url' => BASE_URL,
                'validation_errors' => $validation_errors,
            ]);
    }

}
