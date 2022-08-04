FROM php:8.1.7-apache
ENV TZ=GMT+2

# Copy my custom php.ini settings as well as my custom vhost settings to the relevent files
COPY config/php.ini /usr/local/etc/php/conf.d/php.ini
COPY config/vhost.conf /etc/apache2/sites-enabled/php.conf

# Make sure my application timezone is the correct one on my docker image
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Set up folders for my sessions
RUN mkdir -p /var/lib/php/session
RUN chown -R www-data:www-data /var/lib/php/session/

# Install some libraries into my image
RUN apt-get update && apt-get install -y \
    vim \
        wget \
        unzip \
        git \
        iputils-ping \
        libxml2-dev \
		curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install soap
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install intl

# Enable mod_headers
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/ && \
    cp /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/

# expose the port to use within the docker image
EXPOSE 80