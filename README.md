Опис проєкту Простий TODO-додаток на Laravel з MySQL у Docker.
Вимоги
- Docker і Docker Compose
- Git

Швидкий старт
1. Скопіюйте файл середовища:
``` bash
cp .env.example .env
```
1. Зберіть і запустіть контейнери:
``` bash
docker compose build
docker compose up -d
```
1. Увійдіть у контейнер застосунку:
``` bash
docker compose exec app bash
```
1. Ініціалізуйте застосунок і БД:
``` bash
php artisan key:generate
php artisan migrate
```
Доступ
- Веб-інтерфейс: http://localhost:8080
- Підключення до БД з хоста:
    - Host: localhost
    - Port: 3307
    - Database: todo
    - User: todo_user
    - Password: todo_pass
