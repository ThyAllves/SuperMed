FROM php:8.2-apache

# Instala as dependências e ativa MySQLi e PDO
RUN apt-get update && apt-get install -y default-mysql-client \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli pdo pdo_mysql

WORKDIR /var/www/html

COPY . .

EXPOSE 80

CMD ["apache2-foreground"]
