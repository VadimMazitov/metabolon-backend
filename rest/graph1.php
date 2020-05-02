<?php

require '../controllers/MesswerteController.php';

// means that access will be allowed only to this URL
header('Access-Control-Allow-Origin: http://localhost:4200');

$contr = new messwerte_controller();

$result = $contr->getFirstGraphData(2019, 'zulauf');

echo $result;