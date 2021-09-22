#!/bin/sh

DIR=$(pwd)'/vendor';
if [ ! -d "$DIR" ]; then

    composer install

    php artisan key:generate

    php artisan migrate:fresh --seed

fi

php artisan config:clear

php artisan route:clear

php artisan optimize:clear

