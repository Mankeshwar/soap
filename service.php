<?php
error_reporting(E_ALL);

include './client.php';
$id_array = array('id' => '1');
echo $client->getName($id_array);


?>