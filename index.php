<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

function publish($msg){
	// Ajustar o IP conforme o seu docker
	$connection = new AMQPStreamConnection('172.17.0.2', 5672, 'guest', 'guest');
	$channel = $connection->channel();
	$channel->queue_declare('hello', false, false, false, false);
	$qMsg = new AMQPMessage($msg);
	$channel->basic_publish($qMsg, '', 'hello');
}

if(isset($_POST['msg'])){
	publish($_POST['msg']);
}
?>
<html>
<body>
	<form method="post">
		<input type="text" value="" name ="msg"/>
		<input type="submit" value="Enviar para fila" />
	</form>
<body>
</html>
