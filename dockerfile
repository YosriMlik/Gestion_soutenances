FROM php:8.2.0

# Install required dependencies
RUN apt-get update -y && apt-get install -y openssl zip unzip git libonig-dev

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install pdo mbstring

# Set the working directory
WORKDIR /app

# Copy application files
COPY . /app

# Install Composer dependencies
RUN composer install

# Expose port and set command to run Laravel development server
EXPOSE 8181
CMD php artisan serve --host=0.0.0.0 --port=8181
