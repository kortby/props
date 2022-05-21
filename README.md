# Welcome to PropsManager

-   Admin panel for users:

    -   Apartement Properties
    -   units:
    -   unit_type
    -   maintenance
    -   maintenance_category

    ## Roles and permissions

    -   super admin
    -   property owner
        -   property managers
            -   sales
            -   tenant ( pay bill, sign lease)
            -   contact ( plumers cleaner electris.....)

    ### our advantage to be better than others:

    -   contact service pro
    -   accounting
    -   managing units and websites

    # setup line commands just to remember for later:

    `php artisan migrate:fresh --seed `


## Pul our project in Google cloud platform

    ### Build Docker
        - create `docker` folder in props
        - in `docker` with phpstorm make new `NGINX` called nginx.conf
        - in `docker` with phpstorm make new `Supervisord conf` called Supervisord.conf
        - in the directory create Dockerfile
        ```
        FROM php:7.4-fpm-alpine

        RUN apk add --no-cache nginx wget

        RUN mkdir -p /run/nginx

        COPY docker/nginx.conf /etc/nginx/nginx.conf

        RUN mkdir -p /app
        COPY . /app

        RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
        RUN cd /app && \
            /usr/local/bin/composer install --no-dev

        RUN chown -R www-data: /app

        CMD sh /app/docker/startup.sh
        ```

        - in `docker` with phpstorm create new `file` called startup.sh
        ```
        #!/bin/sh

        sed -i "s,LISTEN_PORT,$PORT,g" /etc/nginx/nginx.conf

        php-fpm -D

        while ! nc -w 1 -z 127.0.0.1 9000; do sleep 0.1; done;

        nginx
        ```
        