FROM bitnami/php-fpm:latest-prod
RUN usermod -u 1000 daemon
RUN groupmod -g 1000 daemon
RUN sed -i 's/9000/9103/g' /opt/bitnami/php/etc/php-fpm.d/www.conf
RUN apt-get -y update && apt-get -y install \
sendmail \
npm