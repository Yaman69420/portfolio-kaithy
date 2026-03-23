#!/bin/bash

# Create necessary directories in the mounted volume
mkdir -p storage/app/public
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/logs

# Run migrations
php artisan optimize:clear
php artisan migrate --force
php artisan db:seed --force

# Create storage link
php artisan storage:link --force
