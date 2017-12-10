<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('172.17.0.2', 5672, 'guest', 'guest');

$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('hellooooo');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";
