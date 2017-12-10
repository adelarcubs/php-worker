<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('172.17.0.2', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$callback = function($msg) {
  echo " [x] Received ", $msg->body, "\n";
};

$callback_other = function($msg) {
  echo " A OUTRA LISTA", $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);


$channel->basic_consume('otherlist', '', false, true, false, false, $callback_other);


while(count($channel->callbacks)) {
    $channel->wait();
}
