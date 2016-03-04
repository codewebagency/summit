<?php
/**
 * Created by PhpStorm.
 * User: bahrami
 * Date: 1/17/2016
 * Time: 10:47 AM
 */

namespace Helpers;

use Illuminate\Support\Facades\Config;

class User extends \ptejada\uFlex\User {
    public function __construct()
    {
        parent::__construct();

        //Add database credentials
        $this->config->database->host = 'localhost';
        $this->config->database->user = 'root';
        $this->config->database->password = '';
        $this->config->database->name = 'hosttracker';
        // Start object construction
        $this->start();
    }
}