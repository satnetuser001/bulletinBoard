Laravel Framework 9.11.0
Bulletin Board. Доска Объявлений.

Учебный проект по книге Дронова В.А. "Laravel 8. Быстрая разработка веб-сайтов на PHP".
В проекте реализованно разграничение прав пользователей с помощью библиотеки Laravel/ui и политики: зарегистрированные пользователи могут создавать объявления и редактировать только свои объявления.
При помощи Middleware "isAdmin" только Администратор сайта имеет доступ к странице "Настройки сайта".

-Установка:
1. Скопируйте проект в папку.
2. Создайте mysql базу данных с именем "laravel".
3. Создайте пользователя базы данных с именем "laravel_user" и паролем "1077" и дайте ему все права в базе данных созданной в п.2.
4. Накатите дамп базы данных laravel из папки dumpDB.
5. Запустите PHP веб-сервер командой выполняемой в папке проэкта: php artisan serve

-Демонстрация:
1. Откройте сайт проэкта по адресу:
	http://127.0.0.1:8000
2. Аутентифицируйтесь нажав кнопку "Вход" разными пользователями с разными правами:

	Login: admin@gmail.com
	Password: 1077

	Login: user1@gmail.com
	Password: 1077

	Login: user2@gmail.com
	Password: 1077