#!/bin/bash

echo "Setting up Laravel GoFundMe Clone..."

# Start containers
echo "Starting Docker containers..."
docker compose -f compose.dev.yaml up -d

# Wait for containers to be ready
echo "Waiting for containers to be ready..."
sleep 10

# Run migrations
echo "Running migrations..."
docker compose -f compose.dev.yaml exec workspace php artisan migrate --force

# Run seeders
echo "Running seeders..."
docker compose -f compose.dev.yaml exec workspace php artisan db:seed --force

# Create storage link
echo "Creating storage link..."
docker compose -f compose.dev.yaml exec workspace php artisan storage:link

echo "Setup complete! You can now access the application at http://localhost"
