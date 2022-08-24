## brif
* 01-baseLaravel php 7.4 + laravel 7
  * `composer install && update`
* `composer create-project --prefer-dist laravel/laravel:^7.0 dir-poject`

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
* `php artisan route:list --path=admin` // Список всех существующих маршрутов // --path фильтр по URL

## Миграции
* https://laravel.su/docs/8.x/migrations
* `php artisan migrate`  // Выполнить не активированные миграции
* `php artisan migrate:rollback`
* `php artisan make:migration create_posts_table`
* `php artisan make:migration change_posts_table --table=posts` // Для таблицы post
    * `composer require doctrine/dbal`
* `php artisan migrate:reset`

## Пакетный менеджер npm
* `npm install`
* `npm install --legacy-peer-deps`
* `npm run dev`
* `npm run watch`
  * `npm install browser-sync browser-sync-webpack-plugin@2.0.1 --save-dev --production=false --legacy-peer-deps` Конфликт зависимостей

## Символические ссылки для картинок из /public/storage/... в  /storage/app/public/...
* `php artisan storage:link`

## Генерация сущностей
* `php artisan make:controller PhotoController --resource` // Генерация контролера // -r генерация CRUD
* `php artisan make:model Post -m` // Генерация модели и миграции к ней
* `php artisan vendor:publish --tag=laravel-pagination` // стоковые шаблоны оформления пагинации
* `php artisan make:middleware AdminMiddleware` // генерация посредника доступа Middleware (слой для управления правами доступа)
* `php artisan make:mail TestMail` // настройка Mail
* `php artisan make:seeder PostsSeeder` // генерация посева для фейковых данных в БД
  * /database/seeds/PostsSeeder.php
  * `php artisan make:factory PostFactory -m Post` // генерация фабрики с указанием модели
    * /database/factories/PostFactory.php
  * `php artisan db:seed` // Запуск всех сидоров из /database/seeds/DatabaseSeeder.php
* `php artisan make:request StoreCategory` // Генерация контроллера под валидацию /app/Http/Requests/StoreCategory.php

## Сторонние библиотеки
* `composer require barryvdh/laravel-debugbar --dev`
  * `php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"`
* `composer require cviebrock/eloquent-sluggable:^7.0`


