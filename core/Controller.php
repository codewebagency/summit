<?php
namespace Core;
use Application\Models\User;
use Core\Application;
use Core\View;
use Helpers\Url;
use App;

class Controller extends Application {

    protected $controller;
    protected $action;
    protected $models;
    protected $view;
    protected $user;

    public function __construct($controller, $action) {
        parent::__construct();
        $this->controller = $controller;
        $this->action = $action;
        $this->view = new View();
    }

// Load model class 

    protected function load_model($model) {
        if (class_exists($model)) {
            $this->models[$model] = new $model();
        }
    }

// Get the instance of the loaded model class 
    protected function get_model($model) {
        if (is_object($this->models[$model])) {
            return $this->models[$model];
        } else {
            return false;
        }
    }
    /**
     * @return View
     */
// Return view object 
    protected function get_view() {
        return $this->view;
    }

    /**
     * return true if the request is an ajax call
     * 
     */
    public function is_ajax() {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            return false;
        }
    }
    /**
     *
     */
    public function redirect($url_array)
    {
        Url::to(array('controller' => $url_array['controller'], 'action' => $url_array['action']));
    }
    public function __destruct()
    {
        unset($this);
    }

}
