# "Init" container to prepare wordpress core
FROM alpine:latest as downloader

ENV WORDPRESS_VERSION 5.1.1
ENV WORDPRESS_SHA1 f1bff89cc360bf5ef7086594e8a9b68b4cbf2192

# Download Wordpress to /tmp for further processing
RUN set -ex; \
    apk add --no-cache curl; \
	curl -o wordpress.tar.gz -fSL "https://wordpress.org/wordpress-${WORDPRESS_VERSION}.tar.gz"; \
	echo "$WORDPRESS_SHA1 *wordpress.tar.gz" | sha1sum -c -; \
	tar -xzf wordpress.tar.gz -C /tmp;

WORKDIR /tmp/wordpress/

# We are going to remove all default plugins and themes that are shipped with Wordpress. Also some other non-core files.
# These are directories yet we maintain the default index.php for security in the themes and plugins dirs
RUN find ./wp-content/themes/ -maxdepth 1 -mindepth 1 -type d -exec rm -r {} \;; \
    find ./wp-content/plugins/ -maxdepth 1  -mindepth 1 -type d -exec rm -r {} \;; \
    rm wp-config-sample.php; \
    rm readme.html

# Starting the actual container
FROM php:7.3-apache
WORKDIR /var/www/html/
COPY --from=downloader /tmp/wordpress/ /var/www/html/
COPY wp-config.php /var/www/html/
RUN chown www-data:www-data . -R

CMD ["apache2-foreground"]