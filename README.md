<h1>NOTEBOOK API</h1>

**Краткое описание:** 

Записная книжка, основанная на архитектурном стиле RESTful API.

**Основные инструменты:** 

PHP7.4+Nginx+MySQL+Docker+Laravel 8+Swagger.

**Роуты и основной функционал:** 

* GET /api/v1/notebook/ - Вывод списка записей;
* POST /api/v1/notebook/ - Добавление одной записи;
* GET /api/v1/notebook/{id}/ - Вывод одной записи;
* POST /api/v1/notebook/{id}/ - Редактирование одной записи;
* DELETE /api/v1/notebook/{id}/ - Удаление одной записи;
* GET /api/documentation#/ - Документация Swagger;

**Установка:**

1. Клонировать проект на локальную машину;
2. Установить зависимости командой `composer install`;
3. Использовать команду `docker-compose up --build` для сборки и запуска контейнеров;
4. Запустить миграции внутри контейнера _application-backend_ командой `docker exec -i {container_id} php artisan migrate`;


