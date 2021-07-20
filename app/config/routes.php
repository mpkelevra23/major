<?php

// Массив с путями (роутами)
return [
    // Главная страница
    'index' => 'site/index', // actionIndex в SiteController
    '(.)+' => 'site/error', // actionError в SiteController
    '' => 'site/index', // actionIndex в SiteController
];
