FROM php:7.4-fpm

# Install dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
		git \
		curl \
		zip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        wget \
        unzip \
	&& pecl install xdebug \
	&& docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Clear cache
RUN apt-get clean && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* && docker-php-source delete

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]