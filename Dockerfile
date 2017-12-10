FROM php:cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp


RUN docker-php-ext-install bcmath




CMD [ "php", "./read.php" ]
