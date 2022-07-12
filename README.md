# Тестовое задание "Перепись" (Population census)

![population-censuses](https://user-images.githubusercontent.com/7511983/178609114-5b5400a7-87ee-45a8-a01a-8490d2e88b3d.jpg)

# Ключевые особенности:
1) Docker-compose
2) Migrations, Factory, Seeders

## Стек:

- Docker-compose
- PHP-8.1.7 FPM
- Laravel 9
- SQLite
- Пакеты (Laravel Breeze, TailwindCSS, Laravel IDE Helper)

## Как развернуть

1) Клонировать данный репозиторий
2) Выбрать `.env.dev.example`или `.env.prod.example` за основу
3) `composer install --optimize-autoloader --ignore-platform-reqs`
4) `php artisan key:generate`
5) `yarn install`
6) `yarn run build`
7) `./vendor/bin/sail build --no-cache`
8) `./vendor/bin/sail up` или `docker-compose up`
9) Внутри Докера выполнить `php artisan migrate --seed`
10) Открыть приложение в браузере `http://localhost`, если всё в порядке, то идём дальше.
11) `php artisan config:cache`
12) `php artisan route:cache`
13) `php artisan view:cache`
14) Учётная запись по умолчанию:
    Email: `test@example.com`
    Пароль: `12345678`

Автор: [twent](https://github.com/twent)
