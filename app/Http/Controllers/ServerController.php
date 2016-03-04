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
use Base\ServerQuery;

class ServerController extends Controller {

    /**
     * @Route("/server")
     */
    public function Index() {
        $message = '';
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            unset($_GET['message']);
        }
        $servers = ServerQuery::create()->find();
        $serverArray = [];
        foreach ($servers as $server) {
            $serverArray[] = [
                'ip' => $server->getIp(), 
                'id' => $server->getId(), 
                'celery_username' => $server->getCeleryUsername(),
                'celery_password' => $server->getCeleryPassword(),
                    ];
        }
        $serverJson = json_encode($serverArray);
        $user = new \Helpers\User();
        if ($user->isSigned()) {
            $this->load_template('server/list.tpl', [
                    'base_url' => BASE_URL,
                    'server_json' => $serverJson,
                    'message' => $message,
                ]);
        } else {
            $this->load_template('admin/login-form.tpl', [
                    'base_url' => BASE_URL
                ]);
        }
    }

    /**
     * creates a new server
     */
    public function create() {
        if (isset($_POST['ip']) && isset($_POST['celery_username']) && isset($_POST['celery_password'])) {
            $_POST['ip'] = filter_var($_POST['ip'], FILTER_SANITIZE_STRING);
            $_POST['celery_username'] = filter_var($_POST['celery_username'], FILTER_SANITIZE_STRING);
            $_POST['celery_password'] = filter_var($_POST['celery_password'], FILTER_SANITIZE_STRING);
            if (filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
                $server = new \Server();
                $server->setIp($_POST['ip']);
                $server->setCeleryUsername($_POST['celery_username']);
                $server->setCeleryPassword($_POST['celery_password']);
                $result = $server->save();
                if ($result == 1) {
                    $servers = ServerQuery::create()->find();
                    $serverArray = [];
                    foreach ($servers as $server) {
                        $serverArray[] = ['ip' => $server->getIp(), 'id' => $server->getId(), 'celery_username' =>
                            $server->getCeleryUsername(), 'celery_password' => $server->getCeleryPassword()];
                    }
                    $serverJson = json_encode($serverArray);
                    $this->load_template('server/list.tpl', [
                        'base_url' => BASE_URL,
                        'server_json' => $serverJson,
                        'message' => 'Server information saved successfully !',
                    ]);
                } else {
                    
                }
            } else {
                
            }
        }
    }

    /**
     *
     */
    public function delete() {
        try {
            $id = $_GET['id'];
            $sever = ServerQuery::create()->findPk($id);
            $sever->delete();
            echo "Deleted successfully !";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
