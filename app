<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$app = new \Symfony\Component\Console\Application('demo application');

<<<<<<< HEAD
$app->add(new \App\HelloArgument);
$app->add(new \App\StringTimes);
=======
$app->add(new \App\InteractiveModeUserRequest);
>>>>>>> task3

$app->run();