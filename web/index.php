<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Start.php';

$config = require_once __DIR__ . '/../app/config/main.php';

(new Start($config))->run();
