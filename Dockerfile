FROM php:7.3.9-zts-stretch

#Install server requirements for laravel
RUN apt-get update && apt-get install wget
RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath
RUN wget https://github.com/composer/composer/releases/download/1.9.0/composer.phar && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer

#Make source dir
RUN mkdir /src

#Open port
EXPOSE 8000

#Set working dir to source
WORKDIR /src

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]