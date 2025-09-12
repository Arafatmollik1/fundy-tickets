# Use PHP 8.3 with Apache
FROM php:8.3-apache

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache for Laravel
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Copy composer files first for better layer caching
COPY composer.json composer.lock ./

# Copy the Laravel application structure needed for composer
COPY artisan ./
COPY bootstrap/ ./bootstrap/
COPY app/ ./app/
COPY config/ ./config/
COPY database/ ./database/
COPY routes/ ./routes/

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package.json files
COPY package.json package-lock.json* ./

# Install Node dependencies
RUN npm install

# Copy the rest of the application
COPY . .

# Run any remaining composer scripts now that all files are present
RUN composer dump-autoload --optimize

# Create Laravel storage directories and bootstrap cache
RUN mkdir -p storage/framework/{cache,sessions,views,testing} \
    && mkdir -p storage/app/public \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Add entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]