FROM php:8.0

RUN apt-get update && apt-get upgrade -y && apt-get install -y git zip unzip curl \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php \
    && docker-php-ext-install bcmath exif

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -

RUN apt-get install -y nodejs

RUN npm install -g serverless

RUN npm install -g serverless-stack-output