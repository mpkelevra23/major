<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/template/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<header>
    <div class="header_logo">
        <a href="/">M</a>
    </div>
</header>
<main class="main">
    <form action="#" class="main_request request" method="post">
        <h1 class="request_caption caption">Приложение</h1>
        <label for="palindrome">Веб-приложение, которое находит палиндромы</label>
        <input type="text" name="palindrome" id="palindrome" placeholder="палиндром">
        <input type="button" id="sendPalindrome" name="submit" value="Найти">
    </form>
    <div class="main_answer answer" id="answer"></div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/template/js/ajaxRequest.js"></script>
</body>
</html>