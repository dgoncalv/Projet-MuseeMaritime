FROM registry.univ-lr.fr:80/iutlr-info/iutlr-info-nodejs14-15-5

LABEL MAINTAINER="Jamal Malki <jmalki@univ-lr.fr>"
LABEL Vendor="Jamal Malki"
LABEL Description="Node-10-Apache2"
LABEL Version="Février-2021"

####### APP_DOCUMENT_ROOT
ARG APP_DOCUMENT_ROOT
ENV APP_DOCUMENT_ROOT=${APP_DOCUMENT_ROOT}

####### Workdir
WORKDIR ${APP_DOCUMENT_ROOT}

COPY ./app ./

####### angular/cli
RUN npm i -g @angular/cli

####### Install dependecies
RUN npm i

####### Expose the port the app runs in
EXPOSE 4200

####### Serve the app

RUN ls
RUN pwd
CMD ["ng","serve","--host", "0.0.0.0", "--poll=2000"]
