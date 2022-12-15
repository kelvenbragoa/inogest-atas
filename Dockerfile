FROM php:8.1-fpm

ARG project=inogest-atas
ARG user=deployer
ARG uid=1000


RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    node.js \
    npm \
    rsync \
    sshpass

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -LO https://deployer.org/deployer.phar

RUN mv deployer.phar /usr/local/bin/dep

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
chown -R $user:$user /home/$user

WORKDIR /var/www/$project
COPY . /var/www/$project

USER $user