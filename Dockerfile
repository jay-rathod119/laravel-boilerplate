FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    curl \
    libsqlite3-dev \
    libicu-dev \
    libzip-dev

# Install PHP extensions required by app/composer packages
RUN docker-php-ext-install pdo pdo_sqlite intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Ensure startup script is executable
RUN chmod +x docker/railway-entrypoint.sh

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port
EXPOSE 10000

# Start app via entrypoint (creates sqlite file, runs migrations, serves app)
CMD ["sh", "docker/railway-entrypoint.sh"]
