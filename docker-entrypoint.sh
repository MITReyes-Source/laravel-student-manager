#!/bin/sh
set -e

php artisan migrate --force

php artisan db:seed --class="Database\Seeders\StudentManagerSeeder" --force || true

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
