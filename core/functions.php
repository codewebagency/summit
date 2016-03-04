<?php

// create helper functions here
/**
 * Suppose, you are browsing in your localhost
 * http://localhost/myproject/indexo.php?id=8
 */
function getBaseUrl()
{
    // output: /myproject/indexo.php
    $currentPath = $_SERVER['PHP_SELF'];

    // output: Array ( [dirname] => /myproject [basename] => indexo.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

    // return: http://localhost/myproject/
    return $protocol . $hostName . $pathInfo['dirname'] . "/";
}

/**
 *
 */
function storage_path()
{
     return 'http://91.109.23.124/hosttracker' . "/storage";
}

/**
 * check Url accessability
 */
function checkRemoteUrl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if (curl_exec($ch) !== FALSE) {
        return $ch;
    } else {
        return false;
    }
}

/**
 *
 */
function get_classname($string, $delimiters = '', $encoding = NULL)
{
    $words = explode("\\", $string);
    $classname = end($words);
    return ucfirst(strtolower($classname));
} 
