<?php
namespace Helpers;
use Core\Router;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Url
 *
 * @author hossein
 */
class Url {
    /**
     * 
     * @param type $urlArray associative array contains controller and action names
     * @param type $params optional array contains request params
     */
    public static function to($urlArray, $params = array()) {
        $params = implode("/", $params);
        Router::route($urlArray['controller'] . "/" . $urlArray['action'] . "/" . $params);
    }
}
