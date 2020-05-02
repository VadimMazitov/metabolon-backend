<?php

require '../controllers/MesswerteController.php';

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// means that access will be allowed only to this URL
header('Access-Control-Allow-Origin: http://localhost:4200');

$contr = new messwerte_controller();

$parts = parse_url($url);
parse_str($parts['query'], $query);

echo $contr->getThirdGraphData(2019, $query['month']);
