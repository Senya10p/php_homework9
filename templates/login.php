<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вход в админ-панель</title>
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
    <div style="text-align: center; "><h1 style="color: cornflowerblue">Вход в админ-панель</h1></div>
    <h4>Авторизация</h4>
    <!--. 3. Форма входа на сайт-->
    <form action="/../admin/login.php" method="post">
        Логин: <input type="text" name="login">
        Пароль: <input type="password" name="password">
        <button type="submit">Войти</button>
    </form>
    <p>Введите логин и пароль</p>
</section>
<br><br><br><br><br><br>
<footer style="vertical-align: middle; background-color: yellowgreen;">
    <div style="color: indigo; margin-left: 30px">E-mail: fuss-fuss-fuss@yandex.ru</div>
</footer>
</body>
</html>