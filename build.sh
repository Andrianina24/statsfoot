#!/bin/bash
#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

export VERSION=`cat version`

# Set up environment
docker version
docker buildx ls
docker buildx create --name phpbuilder
docker buildx use phpbuilder

echo "Building: PHP Container"
docker buildx build --platform linux/amd64,linux/arm64 -t "richarvey/nginx-php-fpm:${VERSION}" -t richarvey/nginx-php-fpm:latest --push .

