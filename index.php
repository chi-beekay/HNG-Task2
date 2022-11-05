<?php

// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$json = file_get_contents('php://input');


$data = json_decode($json);

$operation = strtolower($data->operation_type);
$x = $data->x;
$y = $data->y;

switch ($operation) {
    case "addition":
        $result = $x + $y;
        break;
    case "subtraction":
        $result = $x - $y;
        break;
    case "multiplication":
        $result = $x * $y;
        break;
    default:
        echo ("invalid Operation");
        return 0;
}

$context = array(
    "slackUsername" => "qi_beekay",
    "operation_type" => $operation,
    "result" => $result,
);
$obj = (object)$context;


$myJSON = json_encode($obj);
echo $myJSON;
