<?php

namespace Major\controllers;

use Major\components\Template;
use Major\models\Palindrome;

/**
 * Controller для работы с главной страницей сайта
 * Class SiteController
 */
class SiteController
{

    private static string $title = 'Major';
    private static string $answer = '';
    private static ?array $palindromeList;
    private static array $titles = [
        'palindromes' => [
            '" найден % d палиндром ',
            '" найдено % d палиндрома',
            '" найдено % d палиндромов'
        ],
        'words' => [
            '" найдено % d слово палиндром',
            '" найдено % d слова палиндрома',
            '" найдено % d слов палиндромов'
        ]
    ];

    /**
     * Action для главной страницы
     * @return bool
     */
    public function actionIndex()
    {
        // Выводим
        echo Template::viewInclude(
            '../views/site/index.php',
            [
                'title' => self::$title
            ]
        );
        return true;
    }

    /**
     * Ajax запрос на обработку палиндрома
     * @return bool
     */
    public function actionAjaxRequest()
    {
        // Проверяем наличие запроса
        if (!empty($_POST['palindrome'])) {
            // Очищаем запрос и создаём объект класса Palindrome
            $palindrome = new Palindrome(mb_strtolower(trim(htmlspecialchars(strip_tags($_POST['palindrome'])))));
            // Если это предложение и оно является палиндромом, то выводим список всех палиндромов
            if ($palindrome->isSentence() && $palindrome->isPalindrome()) {
                self::$palindromeList = $palindrome->getPalindromeList();
                self::$answer = 'В предложении "'.$palindrome->getPalindrome().self::decay(
                        count(self::$palindromeList),
                        self::$titles['palindromes']
                    );
            // Если это слово и оно является палиндромом, то выводим список всех палиндромов
            } elseif (!$palindrome->isSentence() && $palindrome->isPalindrome()) {
                self::$palindromeList = $palindrome->getPalindromeList();
                self::$answer = 'В слове "'.$palindrome->getPalindrome().self::decay(
                        count(self::$palindromeList),
                        self::$titles['palindromes']
                    );
            /*
             * Если это предложение и оно содержит слова палиндромы,
             * то выводим список всех слов и содержащихся в этих словах палиндромов
             */
            } elseif ($palindrome->isSentence() && !$palindrome->isPalindrome()) {
                foreach ($palindrome->getWordsFromSentence() as $word) {
                    $palindromeFromSentence = new Palindrome($word);
                    if ($palindromeFromSentence->isPalindrome()) {
                        self::$palindromeList[$palindromeFromSentence->getPalindrome(
                        )] = $palindromeFromSentence->getPalindromeList();
                    }
                }
                if (!empty(self::$palindromeList)) {
                    self::$answer = 'В предложении "'.$palindrome->getPalindrome().self::decay(
                            count(self::$palindromeList),
                            self::$titles['words']
                        );
                } else {
                    self::$answer = 'Не найдено ни одного палиндрома';
                    self::$palindromeList = null;
                }
            } else {
                self::$answer = 'Не найдено ни одного палиндрома';
                self::$palindromeList = null;
            }
        } else {
            self::$answer = 'Введите текст';
            self::$palindromeList = null;
        }

        // Выводим
        echo Template::viewInclude(
            '../views/site/answer.php',
            [
                'palindromeList' => self::$palindromeList,
                'answer' => self::$answer
            ]
        );
        return true;
    }

    /**
     * Метод для склонения слов
     * @param $count
     * @param $titles
     * @return string
     */
    private static function decay($count, $titles): string
    {
        $cases = [2, 0, 1, 1, 1, 2];
        $format = $titles[($count % 100 > 4 && $count % 100 < 20) ? 2 : $cases[min($count % 10, 5)]];
        return sprintf($format, $count);
    }
}
