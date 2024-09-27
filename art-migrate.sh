#!/bin/bash

php artisan key:generate

php artisan migrate:fresh

php artisan passport:install --force --no-interaction

php artisan serve --host 0.0.0.0 --port=8000
