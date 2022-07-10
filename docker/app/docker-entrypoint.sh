#!/bin/bash

echo "########## COMPOSER INSTALL ##########"
composer install

echo "########## SETTING ENV ##########"
# cp .env.example .env

echo "########## KEY GENERATE ##########"
php artisan key:generate

echo "########## RUNNING MIGRATIONS ##########"
php artisan migrate

php-fpm
