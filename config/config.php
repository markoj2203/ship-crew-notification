<?php

$dsn = 'mysql:host=localhost;dbname=ship_notification;charset=utf8';

return array(
    'DatabaseHandler' => DI\object('DatabaseHandler')->constructor('localhost', 'ship_notification', 'root', ''),
    '\Slim\PDO\Database' => DI\object('\Slim\PDO\Database')->constructor($dsn, 'root', ''),
);


