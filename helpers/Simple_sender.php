<?php
namespace Helpers;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Simple_sender
 *
 * @author hossein
 */
class Simple_sender {
    //put your code here
    /**
     * 
     */
    public function execute($input)
    {
        // Create a connection to RabbitAMQP
        $connection = new AMQPStreamConnection('localhost', 5672, 'newuser', '12345') or die('can not connect');
        /** @var $channel AMQPChannel */
        $channel = $connection->channel();
        $channel->queue_declare(
                'pizza',
                false,
                false,
                false,
                false
                );
        $msg = new AMQPMessage($message, array('delivery_mode' => 2)); # make message persistent);
        $channel->basic_publish(
                $msg,
                '',         # exchange
                'pizza' #Routing Key
                );
        $channel->close();
        $connection->close();
    }
}
