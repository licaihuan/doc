<?php
$queue  = '/queue/FUK-T';


/* connection */
try {
    $stomp = new Stomp('tcp://localhost:61613');
    $stomp->subscribe($queue);
    while(1){
      if($stomp->hasFrame()){
            /* read a frame */
            $frame = $stomp->readFrame();
       	    var_dump($frame);
    	    /* acknowledge that the frame was received */
       	    $stomp->ack($frame); 

      }
      else{
	echo 'NO=====>'.PHP_EOL;
      }
    }
} catch(StompException $e) {
    die('Connection failed: ' . $e->getMessage());
}
