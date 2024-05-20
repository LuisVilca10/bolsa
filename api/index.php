<?php
include_once "includes/config.php";
include_once "includes/conectar.php";
include_once "includes/manejador.php";
// echo "Este es el punto de la api";
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    $db = new DBManejador();
    $empresa = $db->listEmpresa();
    $resp = array();
    $resp['error'] = false;
    $resp['message'] = "SUCCESS";
    $resp['data'] = $empresa;
    echoResponse(200, $resp['data']);
} elseif ($method == "POST") {

}

function echoResponse($code, $messagey)
{
    //clear the old headers
    //header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    // ok, validation error, or failure
    header('Status: ' . $code);
    // return the encoded json
    echo json_encode($messagey);
}
