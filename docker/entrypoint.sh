#!/bin/bash
set -e

# Wait for MySQL
echo "Waiting for MySQL..."
until php -r "try { new PDO('mysql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); exit(0); } catch (Exception \$e) { exit(1); }"; do
  sleep 2
done
echo "MySQL is up!"

# Install composer deps if vendor is missing
if [ ! -d "vendor" ]; then
  echo "Installing PHP dependencies..."
  composer install
fi

# Create missing Laravel dirs
mkdir -p storage/framework/{cache/data,sessions,views,testing}
mkdir -p storage/app/public storage/logs bootstrap/cache resources/views

# Fix permissions
chown -R www-data:www-data storage bootstrap/cache resources
chmod -R 775 storage bootstrap/cache

# Ensure .env exists
if [ ! -f .env ]; then
  cp .env.example .env
  echo ".env created from example"
fi

# Clear caches
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Generate key if needed
php artisan key:generate --force

# Run migrations
php artisan migrate --force || true

# Storage link
if [ ! -L public/storage ]; then
  php artisan storage:link || true
fi

echo "Laravel ready! Starting Apache..."
exec apache2-foreground
