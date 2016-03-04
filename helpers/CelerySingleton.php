<?php
/**
 * Created by PhpStorm.
 * User: bahrami
 * Date: 1/19/2016
 * Time: 9:28 AM
 */

namespace Helpers;

use Celery;

class CelerySingleton
{

    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            //static::$instance = new static();
            static::$instance = new Celery('178.162.214.30', 'rquser', '12345', 'celery', 'celery', 'celery', 5672, 'php-amqplib', true);
        }

        return static::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }


}