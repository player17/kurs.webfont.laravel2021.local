## brif
* 01-baseLaravel php 7.4 + laravel 7

## links doscs
* https://laravel.com/
* https://laravel.su/
* https://www.jetbrains.com/ru-ru/phpstorm/
* https://netbeans.org/
* https://ospanel.io/
* https://www.apachefriends.org/ru/index.html

## Консольные команды
* `php artisan list`
* `php artisan help make:model`

## Создание Controllers
* https://laravel.su/docs/8.x/controllers
* `php artisan make:controller PhotoController --resource`

## Миграции
* https://laravel.su/docs/8.x/migrations
* `php artisan migrate`  // Выполнить не активированные миграции
* `php artisan migrate:rollback`
* `php artisan make:migration create_posts_table`
* `php artisan make:migration change_posts_table --table=posts`
    * `composer require doctrine/dbal`
* `php artisan migrate:reset`

## Модель
* `php artisan make:model Post -m`
* `php artisan make:model City`

## Пакетный менеджер npm
* `npm install`
* `npm install --legacy-peer-deps`
* `npm run dev`
* `npm run watch`
  * `npm install browser-sync browser-sync-webpack-plugin@2.0.1 --save-dev --production=false --legacy-peer-deps` Конфликт зависимостей

## Настройка Mail
* `php artisan make:mail TestMail`

## Генерация посредника доступа Middleware
* `php artisan make:middleware AdminMiddleware`

## Сторонние библиотеки


