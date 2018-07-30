<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
</head>
<body>
<header>
    <div style="text-align: center; "><h1 style="color: cornflowerblue"></h1></div>
</header>
<nav style="vertical-align: middle; background-color: yellowgreen">
    <menu>
        <a href="/index.php">
            <div style="float: left; height: 30px; margin-left: 20px; margin-top: 3px" onmouseover="this.style.backgroundColor='cornflowerblue';" onmouseout="this.style.backgroundColor='yellowgreen';">
                Главная страница
            </div>
        </a>
        <a href="/aboutme.php">
            <div style="float: left; height: 30px; margin-left: 20px; margin-top: 3px" onmouseover="this.style.backgroundColor='cornflowerblue';" onmouseout="this.style.backgroundColor='yellowgreen';">
                Обо мне
            </div>
        </a>
        <a href="/gallery/gallery.php">
            <div style="float: left; height: 30px; margin-left: 20px; margin-top: 3px" onmouseover="this.style.backgroundColor='cornflowerblue';" onmouseout="this.style.backgroundColor='yellowgreen';">
                Фото
            </div>
        </a>
        <a href="/gbook/guestbook.php">
            <div style="float: left; height: 30px; margin-left: 20px; margin-top: 3px" onmouseover="this.style.backgroundColor='cornflowerblue';" onmouseout="this.style.backgroundColor='yellowgreen';">
                Гостевая книга
            </div>
        </a>

        <br><br>
    </menu>
</nav>
<section>
    <div style="text-align: center; "><h1 style="color: cornflowerblue">Гостевая книга</h1></div>
    <div style="text-align: center; ">
        <?php
        foreach ($data as $id => $art) { ?>

            <p><?php echo  $art->getAuthor() .': ' . $art->getText(); ?></p>
            <hr>
            <br>
        <?php } ?>

        <form action="/gbook/guestbook.php" method="post">
            <b>Добавление новой записи</b>
            <p>Имя</p>
            <input type="text" name="author" value="<?php echo $author; ?>">
            <p>Сообщение</p>
            <textarea cols="60" rows="10" name="text"><?php echo $text; ?></textarea>
            <br>
            <button type="submit">Добавить</button>
        </form>
    </div>
</section>
<br><br><br>
<footer style="vertical-align: middle; background-color: yellowgreen;">
    <div style="color: indigo; margin-left: 30px">E-mail: fuss-fuss-fuss@yandex.ru</div>
</footer>
</body>
</html>