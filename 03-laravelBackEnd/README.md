## Мои комменты
###### 02 video `Инициализация`
* `composer update`
* `php artisan migrate`
* `php artisan passport:install`

###### 03 video `Заготовка для модулей`
* `php artisan make:command ModuleMake` // заготовка для генерации модулей
  * `app\Console\Commands\ModuleMake.php`
* `php artisan make:module Admin\User --all`

###### 04 video `Заготовка для модулей`
* `/resources/stubs` // Стабы - заготовки для создания ресурсов
* `php artisan make:module Admin\User --all` // Генерация модуля /app/Modules/Admin/User

###### 05 video `Создание сервис провайдера для модулей`
* `/config/modular.php` // Массив pull настроек
* `php artisan make:provider ModularProvider` // Создадим сервис провайдер для модулей
  * `/config/app.php ` // Подключить в 'providers' => [
* `php artisan route:list` // Проверка работы нового провайдера






