Параметры соединения с базой данных берем из файла config.php

Создаём таблицы для записей гостевой книги guestbook и для хранения хэша и логина администратора admin.
Для этого создаём из консоли новую датабазу hw9. 'CREATE DATABASE hw9'
Затем подключаемся к датабазе hw9 через php storm.
Настройки подключения находятся в файле config.php.

Для создания таблицы guestbook используем запросы:
CREATE TABLE guestbook (id SERIAL, text TEXT, author VARCHAR(100));

Для создания таблицы admin используем запросы:
CREATE TABLE admin (id SERIAL, login VARCHAR(50), hashpass VARCHAR(100));

Добавляем в таблицу записи.
1 запись:
INSERT INTO admin
(login, hashpass)
VALUE
('sergey', '$2y$10$FNtUFP7zjSMipaSWYHw9ceRxkYYAAWZOjHKmLVZ5zzIKb5OeygxE6');

т.е. администратор sergey, пароль: 123, хэш пароля: $2y$10$FNtUFP7zjSMipaSWYHw9ceRxkYYAAWZOjHKmLVZ5zzIKb5OeygxE6

Текст обо мне хранится в файле aboutme.txt

Сайт содержит Главную страницу, страницу Обо мне, страницу Фото, страницу Гостевая книга.
Администратор может редактировать текст обо мне, удалять записи гостевой книги, добавлять файлы в фотогалерею.

В templates находятся шаблоны страниц, в gbook находятся файлы для гостевой книги, в gallery находятся файлы для фотогалереи, в admin нахходятся файлы для выхода и входа в админ-панель.
Для перехода в админ-панель нужно в адресной строке браузера написать http://hw9-1/admin.php.