FROM php:8.2-apache

WORKDIR /var/www/html

COPY composer.json composer.lock /var/www/html/

RUN apt-get update &&\
	apt-get install -y\
	zip\
	unzip\
	git\
	libpq-dev\
	&& docker-php-ext-install\
	pdo_mysql\
	&& docker-php-ext-enable\
	pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY . /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --ignore-platform-reqs
RUN chown -R www-data:www-data /var/www/html/storage \
	&& chown -R www-data:www-data /var/www/html/bootstrap/cache

RUN a2enmod rewrite &&\
	sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"]
