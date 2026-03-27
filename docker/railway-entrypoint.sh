#!/usr/bin/env sh
set -e
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT"

# Render/Railway startup: ensure app key exists for encrypted cookies/sessions.
if [ -z "${APP_KEY:-}" ]; then
  export APP_KEY="base64:$(php -r 'echo base64_encode(random_bytes(32));')"
fi

mkdir -p database
touch database/database.sqlite
php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
