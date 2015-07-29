<?php
date_default_timezone_set("PRC");

$queue  = '/topic/WHY';
$msg    = 'bar';
print_r($argv);
if ($argv[1] != NULL) {
   $msg = $argv[1].rand(1,100000);
}

try {
    $stomp = new Stomp('tcp://localhost:61613');
    while (true) {
      $msg = $argv[1].rand(1,100000);
      $stomp->send($queue, $msg." ". date("Y-m-d H:i:s"));
      sleep(1);
    }
} catch(StompException $e) {
    die('Connection failed: ' . $e->getMessage());
}

