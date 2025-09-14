#!/bin/bash
set -e

# Wait for MySQL
echo "Waiting for MySQL..."
until php -r "try { new PDO('mysql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); exit(0); } catch (Exception \$e) { exit(1); }"; do
  sleep 2
done
echo "DB up"

# Install composer deps if vendor is missing
if [ ! -d "vendor" ]; then
  echo "No vendor found. Running composer install..."
  composer install
fi


# Create missing directories if they don't exist (in case of volume mounts)
mkdir -p storage/framework/{cache/data,sessions,views,testing}
mkdir -p storage/app/public
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p resources/views

# Ensure proper permissions on all storage directories
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/resources
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create .env if it doesn't exist
if [ ! -f .env ]; then
  cp .env.example .env
  echo "Created .env from .env.example"
fi

# Clear caches (with better error handling)
echo "Clearing configuration cache..."
php artisan config:clear || echo "Config clear failed, but continuing..."

echo "Clearing application cache..."
php artisan cache:clear || echo "Cache clear failed, but continuing..."

echo "Clearing route cache..."
php artisan route:clear || echo "Route clear failed, but continuing..."

echo "Clearing view cache..."
php artisan view:clear || echo "View clear failed, but continuing..."

# Generate application key if needed
echo "Generating application key..."
php artisan key:generate --force

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Create storage link if it doesn't exist
if [ ! -L public/storage ]; then
    echo "Creating storage link..."
    php artisan storage:link || echo "Storage link creation failed, but continuing..."
fi

echo "Laravel setup complete. Starting Apache..."

# Start Apache
exec apache2-foreground