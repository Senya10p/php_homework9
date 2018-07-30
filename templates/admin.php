<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Админ-панель</title>
    <style>
        table { border-collapse: collapse; width: 500px; margin: 5px; } /* Убираем двойные линии между ячейками в таблице */
        td { vertical-align: middle; text-align: center; width: 70px }
    </style>
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
        <a href="/../admin/logout.php">
            <div style="float: left; height: 30px; margin-left: 20px; margin-top: 3px" onmouseover="this.style.backgroundColor='cornflowerblue';" onmouseout="this.style.backgroundColor='yellowgreen';">
                Выход из админки
            </div>
        </a>

        <br><br>
    </menu>
</nav>
<section>
    <div style="text-align: center; "><h1 style="color: cornflowerblue">Админ-панель</h1></div>
    <h4>Фотогалерея</h4>
    <p>Загрузка файлов</p>
    <!-- Форма загрузки файлов-->
    <form action="/../admin.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upl">
        <button type="submit">Добавить</button>
    </form>
    <hr>
    <div>
        <?php
        foreach ($list as $id => $img) {
            ?>
            <img src="/gallery/images/<?php echo $img; ?>" height="35px">
            <?php
        }
        ?>
    </div>
    <hr><hr>
    <form action="/../admin.php" method="post">
        <h4>Редактирование текста обо мне</h4>
        <p>Текст</p>
        <textarea cols="60" rows="10"  name="text"><?php echo $records; ?></textarea>
        <br>
        <button type="submit">Изменить</button>
    </form>
    <br>
    <hr><hr>
    <h4>Удаление записей гостевой книги</h4>
    <div>
        <table border="1">
            <td>id</td><td> Имя</td><td>Запись</td>
            <?php foreach ($data as $id => $art ) { ?>
                <tr>
                    <td> <?php echo $id; ?></td>
                    <td><?php echo $art->getAuthor(); ?></td>
                    <td><?php echo $art->getText(); ?></td>
                    <td>
                        <form action="/../admin.php" method="post">
                            <button type="submit" name="del" value="<?php echo $id; ?>">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <br>
    <hr><hr>
</section>
<br>
<footer style="vertical-align: middle; background-color: yellowgreen;">
    <div style="color: indigo; margin-left: 30px">E-mail: fuss-fuss-fuss@yandex.ru</div>
</footer>
</body>
</html>