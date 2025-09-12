#!/bin/bash
set -e

# Wait for MySQL
echo "Waiting for MySQL..."
until php -r "try { new PDO('mysql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); exit(0); } catch (Exception \$e) { exit(1); }"; do
  sleep 2
done
echo "DB up"

# Run Laravel setup
if [ ! -f .env ]; then
  cp .env.example .env
fi

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan key:generate --force
php artisan migrate --force

# Run Node build if in dev
#npm run build

# Start Apache
exec apache2-foreground
