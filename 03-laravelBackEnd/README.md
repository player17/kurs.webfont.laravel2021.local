##
* `README.md`
* `composer.lock`
* `composer.json`
* `.gitignore`
* `.env`

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

###### 06 video `Модуль аутентификации 01`
* `php artisan make:module Pub\Auth --controller --api --view` // Генерация модуля /app/Modules/Pub/Auth
    * `php artisan route:list` // Маршрутов пока для нового модуля нет
* `config\modular.php` // Добавить модуль в конфигурацию 'Pub' => ['Auth']
    * `php artisan route:list` // Маршруты появились
* `php artisan make:controller App/Modules/Pub/Auth/Controllers/LoginController` // Доп контролер для входа
* `php artisan make:controller App/Modules/Pub/Auth/Controllers/Api/LoginController` // Доп контролер для входа

###### 08 video `Модуль аутентификации 03`
* `/app/Modules/Admin/User/Migrations/` // Миграции для базы + удалить старые
    * `php artisan migrate --path=app/Modules/Admin/User/Migrations`
* `php artisan make:seed CreateAdminUser` // Генерация сида - псевдо данные в БД
    * `/database/seeders/CreateAdminUser.php`
        * `php artisan db:seed --class=CreateAdminUser`
* `http://kurs.webfont.laravel2021.local/auths/login` // admin@admin.com + admin
    * `php artisan cache:clear`
    * `php artisan config:clear`
    * `php artisan route:clear`
    * `php artisan view:clear`

###### 09 video `Модуль аутентификации 04 БД под API`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com + admin
* `php artisan make:request App/Modules/Pub/Auth/Requests/LoginRequest`
    * `/app/Modules/Pub/Auth/Requests/LoginRequest.php`

###### 10 video `Настройка конфигов + подключение шаблона`
* `/app/Console/Commands/ModuleMake.php`
    * `function updateModularConfig() { ...` // запись в /config/modular.php ч/з регулярки
* `php artisan make:module Admin\Dashboard --controller --view`
    * `http://kurs.webfont.laravel2021.local/auths/login` // admin@admin.com + admin
    * `http://kurs.webfont.laravel2021.local/admin/dashboard` 

###### 11 video `Главная страница админки`
* `http://kurs.webfont.laravel2021.local/auths/login` // admin@admin.com + admin
* `http://kurs.webfont.laravel2021.local/admin/dashboard`
* `php artisan make:provider App/Services/Localization/LocalizationServiceProvider` // Доп.провайдер для мультиязычности в URL
    * `/config/app.php` // Добавить провайдер в 'providers' => [...
    * `http://kurs.webfont.laravel2021.local/en/admin/dashboard`
        * `/resources/lang/en`
        * `{{__('admin.dahsboard_title')}}`

###### 12 video `Модуль меню 01`
* `php artisan make:module Admin\Menu --controller --model --api --migration`
    * `/app/Modules/Admin/Menu`
* `php artisan migrate --path=App/Modules/Admin/Menu/Migrations`
* `php artisan make:seed AddMenu`
    * `/database/seeders/AddMenu.php`
* `php artisan db:seed --class=AddMenu` // наполняем меню данными

###### 13 video `Модуль меню 02`
* `php artisan db:seed --class=AddMenu` // наполняем меню еще данными
    * `/database/seeders/AddMenu.php`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com + admin
    * копируем api_token
    * `http://kurs.webfont.laravel2021.local/api/admin/menus` // get + Authorization[bearer Token == api_token]
    * очистить кешь шаблонов

###### 14 video `Права и привелегии 01`
* `php artisan make:module Admin\Role --controller --api --view --model --migration`
    * `/config/modular.php`
    * `/app/Modules/Admin/Role/...`
    * `/resources/views/Admin/Role/...`
* `php artisan make:controller App/Modules/Admin/Role/Controllers/PermissionsController --resource`
    * `/app/Modules/Admin/Role/Controllers/PermissionsController.php`
* `php artisan make:model App/Modules/Admin/Role/Models/Permission`
    * `/app/Modules/Admin/Role/Models/Permission.php`
* `php artisan make:policy App/Modules/Admin/Role/Policies/RolePolicy`
    * `/app/Modules/Admin/Role/Policies/RolePolicy.php`
* `php artisan make:migration --path=app/Modules/Admin/Role/Migrations CreatePermissions --create=permissions`
    * `/app/Modules/Admin/Role/Migrations/2022_12_29_201338_create_permissions.php`
* `php artisan make:migration --path=app/Modules/Admin/Role/Migrations CreateRolePermissions`
* `php artisan migrate --path=app/Modules/Admin/Role/Migrations` // Скипирую миграции и запусти

###### 15 video `Права и привелегии 02`
* `php artisan make:request App/Modules/Admin/Role/Requests/RoleRequest` // Валидация добавления ролей
    * `http://kurs.webfont.laravel2021.local/auths/login` // admin@admin.com + admin
    * `http://kurs.webfont.laravel2021.local/admin/dashboard`
    * `http://kurs.webfont.laravel2021.local/admin/roles`
    * `http://kurs.webfont.laravel2021.local/admin/permissions`
