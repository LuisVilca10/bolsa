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
    echoResponse(200, $resp);
} elseif ($method == "POST") {
    //posibles encabezados de la solicityd
    $headers = apache_request_headers();

    if ($headers["Authorization"] == SECRET_KEY) {
        $db = new DBManejador();
        if (empty($_POST)) {
            $resp['error'] = true;
            $resp['message'] = "DATA NULL";
            $resp['data'] = NULL;
            echoResponse(422, $resp);
        }
        if (empty($_POST['razon_social']) || empty($_POST['ruc']) || empty($_POST['dirección']) || empty($_POST['teléfono']) || empty($_POST['correo'])) {
            $resp['error'] = true;
            $resp['message'] = "DATA INCOMPLET";
            $resp['data'] = NULL;
            echoResponse(422, $resp);
        } else {
            $empresa = $db->CreateEmpresa($_POST);
            $resp['error'] = false;
            $resp['message'] = "SUCCESS EMPRESA CREATE";
            $resp['data'] = $_POST;
            echoResponse(200, $resp);
        }
    } else {
        $resp['error'] = true;
        $resp['message'] = "ERROR 401";
        $resp['data'] = NULL;
        echoResponse(401, $resp);
    }
} elseif ($method == "DELETE") {
    $headers = apache_request_headers();
    $db = new DBManejador();
    $id = $_GET['id'];
    if ($headers["Authorization"] == SECRET_KEY && $headers["Authorizationtwo"] == SECRET_KEYTWO) {
        if (empty($_GET['id'])) {
            $resp['error'] = true;
            $resp['message'] = "ID NULL";
            $resp['data'] = NULL;
            echoResponse(422, $resp);
        }
        elseif (!is_numeric($_GET['id'])|| $id <= 0) {
            $resp['error'] = true;
            $resp['message'] = "ID INCORECT";
            $resp['data'] = NULL;
            echoResponse(422, $resp);
        } else {
            $empresa = $db->DeleteEmpresa($id);
            $resp['error'] = false;
            $resp['message'] = "SUCCESS EMPRESA DELETE";
            $resp['data'] = $id;
            echoResponse(200, $resp);
        }
    } else {
        $resp['error'] = true;
        $resp['message'] = "ERROR 401";
        $resp['data'] = NULL;
        echoResponse(401, $resp);
    }
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
