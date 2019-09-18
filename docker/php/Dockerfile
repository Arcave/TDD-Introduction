FROM php:7.2-cli
RUN apt update \
    && apt install -y \
        git \
        libzip-dev \
        zip \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip
COPY . /usr/src/myapp
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /usr/src/myapp