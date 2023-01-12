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
    * `/app/Http/Kernel.php` // определяет посредников для каждой группы пользователей
    * `/app/Http/Middleware/Authenticate.php` // редирект если нужна авторизация
    * `php artisan route:list` // Маршруты
    * `/config/modular.php` // Конфигурация Midleware
    * `/app/Providers/RouteServiceProvider.php` // Собирает все routers
    * `/app/Providers/ModularProvider.php` // Формирует посредников

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
* `php artisan db:seed --class=AddMenu` // наполняем меню данны ми

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

###### 16 video `Права и привелегии 03`
* `http://kurs.webfont.laravel2021.local/admin/permissions` // Логика работы модуля
* `permission_role && role_user` // Таблицы в базе
    * `php artisan cache:clear`
    * `php artisan config:clear`
    * `php artisan route:clear`
    * `php artisan view:clear`

###### 17 video `Права и привелегии 04 && Menu API Permission`
* `php artisan make:migration AddPermissionMenuTable --path=app/Modules/Admin/Menu/Migrations`
    * `php artisan migrate --path=app/Modules/Admin/Menu/Migrations`
        * `INSERT INTO permission_menu (permission_id, menu_id) VALUES ('1', '9');`
        * `INSERT INTO role_user (id, user_id, role_id, created_at, updated_at) VALUES (NULL, '1', '1', NULL, NULL);`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * копируем api_token
    * `http://kurs.webfont.laravel2021.local/api/admin/menus` // get + Authorization[bearer Token == api_token]
    * очистить кешь шаблонов

###### 18 video `API CRUD Users`
* `php artisan make:policy App/Modules/Admin/User/Policies/UserPolicy` // Политика безопасности
    * `INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'USER_ACCESS', 'USER_ACCESS', NULL, NULL);`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/users` // get + Authorization[bearer Token == api_token]
* `php artisan make:request App/Modules/Admin/User/Requests/UserRequest` // Для валидации данных
    * `http://kurs.webfont.laravel2021.local/api/admin/users` // post ==> create new user Tab Body [firstname,lastname,email,phone,password,password_confirmation,role_id]
    * `http://kurs.webfont.laravel2021.local/api/admin/users/{user_id}` // put ==> update user data
    * `http://kurs.webfont.laravel2021.local/api/admin/users/{user_id}` // delete ==> deactivate user

###### 19 video `Источники лидов`
* `php artisan make:module Admin\Sources --api --model`
* `php artisan make:request App/Modules/Admin/Sources/Requests/SourcesRequest`
* `php artisan make:module Admin\Sources --migration`
    * `php artisan migrate --path=app/Modules/Admin/Sources/Migrations`
* `php artisan make:policy App/Modules/Admin/Sources/Policies/SourcePolicy`
    * `INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'SOURCES_ACCESS', '', NULL, NULL);`
* `php artisan db:seed --class=App\Modules\Admin\Sources\Seeds\SourcesSeed`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/sources` // get + Authorization[bearer Token == api_token]
    * `http://kurs.webfont.laravel2021.local/api/admin/sources` // post ==> create new raw [title]
    * `http://kurs.webfont.laravel2021.local/api/admin/sources/5` // put  ==> up line [title]
    * `http://kurs.webfont.laravel2021.local/api/admin/sources/5` // delete  ==> del line [title]

###### 20 video `api lead processing 01`
* `php artisan make:module Admin\Lead --api --model --migration`
    * `php artisan migrate --path=App/Modules/Admin/Lead/Migrations`
* `php artisan make:policy App/Modules/Admin/Lead/Policies/LeadPolicy`
    * `INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'ROLES_ACCESS', 'Roles Access', NULL, NULL);
      INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'LEADS_CREATE', 'LEADS CREATE', NULL, NULL), (NULL, 'LEADS_EDIT', 'LEADS EDIT', NULL, NULL);
      INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'LEADS_ACCESS', 'LEADS ACCESS', NULL, NULL), (NULL, 'DASHBOARD_ACCESS', 'DASHBOARD ACCESS', NULL, NULL);`
* `php artisan make:module Admin\Unit --model`
* `php artisan make:module Admin\Status --model`
* `php artisan make:module Admin\LeadComment --api --model --migration`

###### 21 video `api lead processing 02`
* `php artisan db:seed --class=\App\Modules\Admin\Lead\Seeds\StatusTable`
* `php artisan db:seed --class=\App\Modules\Admin\Lead\Seeds\UnitTable`
    * `INSERT INTO leads (id, phone, link, count_create, is_processed, isQualityLead, is_express_delivery, is_add_sale, source_id, unit_id, user_id, status_id, created_at, updated_at) VALUES (NULL, '89225654891', 'httsp://google.com', '1', '0', '0', '0', '0', '1', '1', '2', '1', '2023-01-10 22:20:25', '2023-01-10 22:20:25');`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads` // get + Authorization[bearer Token == api_token]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads` // post ==> create new lead [link,source_id,unit_id,is_processed]

###### 22 video `api lead processing 03`
* `php artisan migrate --path=app/Modules/Admin/LeadComment/Migrations`
* `php artisan make:migration CreateLeadStatusTable --create=lead_status --path=app/Modules/Admin/Lead/Migrations`
    * `php artisan migrate --path=app/Modules/Admin/Lead/Migrations`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads` // post ==> create new lead [link,source_id,unit_id,is_processed,text]

###### 23 video `api lead processing 04`
* `php artisan make:policy App/Modules/Admin/LeadComment/Policies/LeadCommentPolicy`
    * `/app/Providers/AuthServiceProvider.php` // Регистрация политики безопасности
    * `INSERT INTO permissions (id, alias, title, created_at, updated_at) VALUES (NULL, 'LEADS_COMMENT_ACCESS', 'LEADS COMMENT ACCESS', NULL, NULL);`
* `php artisan make:request App/Modules/Admin/LeadComment/Requests/LeadCommentRequest`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/lead-comments` // post ==> create new comment [lead_id,status_id,text]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads/3` // put ==> create new comment [link,source_id,unit_id,is_processed,text] (`lead_comments`)

###### 24 video `api lead processing 05`
* `http://kurs.webfont.laravel2021.local/api/pub/auths/login` // postman + workspace (my workspace) + post + admin@admin.com[email] + admin[password]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads/archive/index` // get + Authorization[bearer Token == api_token]
    * `http://kurs.webfont.laravel2021.local/api/admin/leads/create/check` // post ==> check lead [link,phone] `leads`
    * `http://kurs.webfont.laravel2021.local/api/admin/leads/update/quality/3` // put ==> up lead `leads`.`isQualityLead`

###### 25 video
