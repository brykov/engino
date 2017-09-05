<?php

/** @var Application $app */
$app = include __DIR__ . '/kernel/Application.php';

print_r($app->getConfig());
