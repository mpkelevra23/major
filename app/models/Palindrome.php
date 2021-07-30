<?php

namespace Major\models;

/**
 * Модель для работы с палиндромом
 * Class Palindrome
 * @package Major\models
 */
class Palindrome
{
    private string $palindrome;

    private string $clearPalindrome;

    private string $reversePalindrome;

    private array $palindromeList;

    public function __construct($palindrome)
    {
        $this->palindrome = $palindrome;
        $this->clearPalindrome = $this->clearPalindrome();
        $this->reversePalindrome = $this->reversePalindrome();
    }

    /**
     * Получить палиндром
     * @return string
     */
    public function getPalindrome(): string
    {
        return $this->palindrome;
    }

    /**
     * Установить палиндром
     * @param  string  $palindrome
     * @return string
     */
    public function setPalindrome(string $palindrome): string
    {
        return $this->palindrome = $palindrome;
    }

    /**
     * Проверяем является ли строка предлжением (наличие пробелов).
     * @return bool
     */
    public function isSentence(): bool
    {
        if (!empty(strpos($this->palindrome, ' '))) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем является ли строка палиндромом.
     * @return bool
     */
    public function isPalindrome(): bool
    {
        if ($this->checkPalindromeLength() && ($this->clearPalindrome == $this->reversePalindrome)) {
            return true;
        }
        return false;
    }

    /**
     * Разворачиваем палиндром
     * @return string
     */
    private function reversePalindrome(): string
    {
        return implode('', array_reverse(preg_split('//u', $this->clearPalindrome, -1, PREG_SPLIT_NO_EMPTY)));
    }

    /**
     * Проверяем длину и наличие середины в палиндроме
     * @return bool
     */
    private function checkPalindromeLength(): bool
    {
        if (mb_strlen($this->clearPalindrome) > 2 && mb_strlen($this->clearPalindrome) % 2 == 1) {
            return true;
        }
        return false;
    }

    /**
     * Очищаем и соединяем палиндром
     * @return string
     */
    private function clearPalindrome(): string
    {
        return preg_replace('/[^\p{L}\p{N}]/u', '', $this->palindrome);
    }

    /**
     * Получаем массив слов из предложения
     * @return false|string[]
     */
    public function getWordsFromSentence()
    {
        return explode(" ", $this->palindrome);
    }

    /**
     * Получаем массив палиндромов
     * @return array|null
     */
    public function getPalindromeList(): ?array
    {
        if ($this->checkPalindromeLength()) {
            $this->palindromeList[] = $this->clearPalindrome;
            $this->clearPalindrome = (mb_substr($this->clearPalindrome, 1, -1));
            return $this->getPalindromeList();
        }
        return $this->palindromeList;
    }
}
