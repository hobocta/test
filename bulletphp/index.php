<?php
require '../vendor/autoload.php';

$app = new Bullet\App(array(
    'template.cfg' => array('path' => __DIR__ . '/templates/')
));

$app->path('bulletphp', function ($request) use($app) {
    $app->path('test', function ($request) use($app) {
        $app->get(function () use($app) {
            $test = 'Test text';

            return $app->template('test', compact('test'));
        });
    });

    return 'Root';
});

echo $app->run(new Bullet\Request);
