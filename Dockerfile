FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libpq-dev \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install intl pdo pdo_pgsql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Copier uniquement les fichiers nécessaires à composer
COPY composer.json composer.lock ./

# Installer les dépendances PHP via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Copier le reste du projet (sans écraser vendor)
COPY . .

# Donner les droits au serveur web si besoin
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80