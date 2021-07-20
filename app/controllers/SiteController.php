<?php

namespace Major\controllers;

use Major\components\Template;

/**
 * Controller для работы с главной страницей сайта
 * Class SiteController
 */
class SiteController
{

    /**
     * Action для главной страницы
     * @return bool
     */
    public function actionIndex()
    {
        //Титул страницы
        $title = 'Major';

        // Выводим
        echo Template::viewInclude(
            '../views/site/index.php',
            [
                'title' => $title,
            ]
        );
        return true;
    }
}