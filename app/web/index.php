<?php

// FRONT CONTROLLER

declare(strict_types=1);

use Major\components\Router;

// Общие настройки
// Включаем отображение ошибок
ini_set('display_errors', '1');
error_reporting(E_ALL);

// Подключаем автозагрузку классов composer
require '../vendor/autoload.php';

// Вызов Router
Router::run();
