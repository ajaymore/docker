FROM ubuntu:16.04

RUN apt-get update -y

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get -y install apache2 apache2-utils mysql-client mysql-server php7.0 libapache2-mod-php7.0 graphviz aspell php7.0-pspell php7.0-curl php7.0-gd php7.0-intl php7.0-mysql php7.0-xml php7.0-xmlrpc php7.0-ldap php7.0-zip php7.0-cli php7.0-cgi

RUN apt-get install -y git-core

COPY moodle-config.php /var/www/html/config.php

COPY ./moodle-3.4.1.tgz /tmp/moodle.tgz

RUN tar -xzf /tmp/moodle.tgz -C /tmp && \
    mv /tmp/moodle/* /var/www/html/

RUN rm /var/www/html/index.html && \
    chown -R www-data:www-data /var/www/html/ && \
    mkdir /var/moodledata/ && \
    echo "placeholder" > /var/moodledata/placeholder && \
    chown -R www-data:www-data /var/moodledata && \
    chmod 777 /var/moodledata && \
    chmod -R 0755 /var/www/html

# Enable SSL, moodle requires it
RUN a2enmod ssl && a2ensite default-ssl  #if using proxy dont need actually secure connection

# Cleanup, this is ran to reduce the resulting size of the image.
RUN apt-get clean autoclean && apt-get autoremove -y && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/lib/dpkg/* /var/lib/cache/* /var/lib/log/*

RUN sudo service apache2 restart