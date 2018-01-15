FROM jhardison/moodle:latest

RUN rm -rf /var/moodledata/*

RUN rm -rf /var/www/html/*

COPY src /var/www/html

COPY moodledata /var/moodledata

COPY moodle-config.php /var/www/html/config.php

RUN chown -Rf www-data.www-data /var/www/html/