<?php

namespace Major\components;

/**
 * Component для контроля вывода
 * Class Template
 */
final class Template
{
    /**
     * @param $file
     * @param  array  $params
     * @return false|string
     */
    public static function viewInclude($file, array $params = [])
    {
        // Установка переменных для шаблона.
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        // Генерация HTML в строку.
        if (is_file($file)) {
            ob_start();
            require_once $file;
            return ob_get_clean();
        } else {
            return false;
        }
    }
}
