FROM registry.univ-lr.fr:80/iutlr-info/iutlr-info-apache2-php7.4-symfony5

LABEL Maintainer="Jamal Malki <jmalki@univ-lr.fr>"
LABEL Vendor="Jamal Malki"
LABEL Description="Apache2-Symfony5-PHP7.2"
LABEL Version="Sept-2020"

####### API_DOCUMENT_ROOT
ARG API_DOCUMENT_ROOT
ENV API_DOCUMENT_ROOT=${API_DOCUMENT_ROOT}

####### vhosts activation 
ADD vhosts /etc/apache2/sites-available

####### add activation 
RUN a2ensite 000-default
