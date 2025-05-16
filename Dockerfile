# Usa uma imagem do PHP com Apache
FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia o código do projeto
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html

# Instala as dependências do Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Porta usada pelo Apache
EXPOSE 80

# Comando padrão ao iniciar o container
CMD ["apache2-foreground"]
