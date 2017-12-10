FROM php:cli

RUN docker-php-ext-install bcmath

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

CMD [ "php", "./worker.php" ]
