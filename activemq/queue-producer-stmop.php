<?php

$queue  = '/queue/FUK-T';


/* connection */
try {
    $stomp = new Stomp('tcp://localhost:61613');
    while(1){
	/* send a message to the queue 'foo' */
	$msg = date('Y-m-d H:i:s').'===>OK';
	$stomp->send($queue, $msg);
	usleep(100);

    }
} catch(StompException $e) {
    die('Connection failed: ' . $e->getMessage());
}
