FROM composer AS composer

COPY --chown=nginx /app /var/www/html

RUN composer install \
  --optimize-autoloader \
  --no-interaction \
  --no-progress

FROM trafex/php-nginx:latest
COPY --chown=nginx --from=composer /app /var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --optimize-autoloader --no-interaction --no-progress

EXPOSE 8080/tcp
