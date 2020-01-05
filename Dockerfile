FROM php:7.2-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    build-essential \
    software-properties-common \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    curl \
    supervisor \
    zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd \
    && docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Update composer packages in parallel
RUN  echo "{}" > /root/.composer/composer.json
RUN composer global require "hirak/prestissimo"

RUN groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

RUN mkdir /www

COPY ./docker/supervisor/ /etc/supervisor/conf.d/

EXPOSE 9000
CMD ["/usr/bin/supervisord"]
