<?php
require '../vendor/autoload.php';

$r3 = new \Respect\Rest\Router('/respect-rest');

$r3->isAutoDispatched = false;

$r3->get('/', function () {
    return 'root';
});

$r3->get('/test', function () {
    return 'test';
});

$r3->get('/user', function () {
    header('HTTP/1.1 404 Not Found');
});

$r3->get('/user/*', function ($id) {
    return 'User ' . $id;
});

echo $r3->run();
