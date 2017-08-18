FROM httpd:latest
COPY ./src/public/ /usr/local/apache2/htdocs/
COPY ./src/private/.htpasswd /etc/
COPY ./src/private/httpd-auth-zone.conf /usr/local/apache2/conf/extra/