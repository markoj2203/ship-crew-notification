<?php
session_start();
date_default_timezone_set('Europe/Belgrade');

use Symfony\Component\HttpFoundation\Request;

require_once("../app/bootstrap.php");
require_once("../gdpr/functions/functions.php");

$request = Request::createFromGlobals();
$post    = $request->request->all();

$error   = false;
$message = "";
$data    = array();

$action = $post['action'];

$controller = $container->get('app\controllers\UserController');

if ("save" == $action) {
    $data = $adController->save($entityManager, $request);
}

$result    = array("data" => $data, 'draw' => 1, "error" => $error, "message" => $message);
$json_data = json_encode($result);
print $json_data;
?>