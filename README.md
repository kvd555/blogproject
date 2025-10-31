# Проект blog.loc

## REST API CMS

Сделан при помощи Laravel и Moonshine

### Как запустить

- **Настроить .env файл**
- **composer install**
- **npm install && npm run build**
- **php artisan key:generate** (если нет ключа в .env)
- **composer run dev**

### Как заселить базу

- **php artisan migrate**
- **php artisan db:seed --class=PostCategorySeeder**
- **php artisan moonshine:user**

Распространяется по свободной эМайТИ лицензии или чето (возможно временно)
