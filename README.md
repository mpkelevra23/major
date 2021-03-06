# Web-приложение "__Палиндром__"

Web-приложение находит слова _[палиндромы](https://en.wikipedia.org/wiki/Palindrome "что это такое?")_ в тексте.
+ Примеры:
  + В слове, которое является палиндромом:
    ![Альтернативный текст](https://i.ibb.co/k6KHnkR/Screenshot-from-2021-07-30-19-33-12.png "Довод")
  + В предложении, которое является палиндромом:
    ![Альтернативный текст](https://i.ibb.co/vHy7WTT/Screenshot-from-2021-07-30-19-32-23.png "А роза упала на лапу Азора")
  + В предложении, которое содержит слова палиндромы:
    ![Альтернативный текст](https://i.ibb.co/X2kFH50/Screenshot-from-2021-07-30-19-33-49.png "Дед и казак пошли и сделали заказ")

---

## Установка приложения

Web-приложение можно развернуть с помощью __Docker__. 
+ Для успешного развёртывания приложения необходимо скачать файлы с приложением в директорию _/var/www/major.local_.
+ В терминале, находясь в директории _/var/www/major.local/app/_ следует прописать команду:
  > docker-compose up -d