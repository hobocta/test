<?php
$test = 'test';

$example = function () use($test) {
    $test = '123';
    echo $test;
};

echo $test;

$example();

echo $test;
