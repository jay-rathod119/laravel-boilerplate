#!/usr/bin/env sh
set -e
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT"

mkdir -p database
touch database/database.sqlite
php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port="${PORT:?PORT must be set by Railway}"
