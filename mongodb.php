<?php
require_once 'vendor/autoload.php';

$client = new \MongoDB\Client;

$collection = $client->test->users;

$result = $collection->insertOne(
    [
        'name' => 'myname2',
        'login' => 'mylogin2',
    ]
);

echo '<pre>';
var_export($result->getInsertedCount());
echo '</pre>';

echo '<pre>';
var_export($result->getInsertedId());
echo '</pre>';

$cursor = $collection->find();

foreach ($cursor as $document) {
    $document['name'] = 'new';
    $result = $collection->replaceOne(['_id' => $document['_id']], $document);
    echo '<pre>';
    var_export($result->isAcknowledged());
    echo '</pre>';
}

$cursor = $collection->find();

foreach ($cursor as $document) {
    echo '<pre>';
    var_export($document);
    echo '</pre>';
}
