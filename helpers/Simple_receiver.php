<?php
namespace Helpers;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Core\MysqliDb;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Simple_receiver
 *
 * @author hossein
 */
class Simple_receiver {
    
    /**
     * Listens for incoming messages
     */
    public function listen()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'newuser', '12345');
        $channel = $connection->channel();
        $channel->queue_declare(
            'pizza',    #queue name, the same as the sender
            false,          #passive
            false,          #durable
            false,          #exclusive
            false           #autodelete
            );
        $callback = function($msg) {
            echo $msg->body."\n";
        };
        $channel->basic_consume(
                'pizza',
                '',  #consumer tag
                FALSE,
                true,
                FALSE,
                FALSE,
                $callback
                );
        while(count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
    /**
     * 
     */
    public function processOrder($msg)
    {
        #$db = new MysqliDb('localhost', 'root', '', 'test');
        #$db->insert('test1', array('column' => $msg));
        echo "sdgjsdhjd";
    }
}
