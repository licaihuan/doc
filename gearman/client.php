<?php
$client=new GearmanClient();
$client->addServer("127.0.0.1",4730); //连接到Job server上
echo $client->doNormal("reverse","Hello World!");
