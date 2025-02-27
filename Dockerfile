FROM composer AS composer

# Copying the source directory and install the dependencies with composer
COPY /app /app

# Run composer install to install the dependencies
RUN composer install \
  --optimize-autoloader \
  --no-interaction \
  --no-progress

# Continue stage build with the desired image and copy the source including the dependencies downloaded by composer
FROM trafex/php-nginx:latest
COPY --chown=nginx --from=composer /app /var/www/html

EXPOSE 8080/tcp
