# Этап сборки
FROM composer as build

WORKDIR /app

COPY composer.json ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

COPY composer.lock ./
RUN touch composer.lock

COPY . ./
RUN php artisan cache:clear
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan optimize

# Этап финального образа
FROM php:7.4-apache

WORKDIR /var/www/html

# Очистка временных файлов
RUN apt-get update && apt-get install -y git
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Копирование только необходимых файлов и папок
COPY --from=build /app /var/www/html

# Использование менее привилегированного пользователя и группы
RUN chown -R www-data:www-data /var/www/html

# Установка разрешений в более безопасный режим
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Порт Apache
EXPOSE 80

CMD ["apache2-foreground"]