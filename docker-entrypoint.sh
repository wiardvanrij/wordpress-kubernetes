#!/bin/bash

array=(
    'DB_NAME::dbname'
    'DB_USER::dbuser'
    'DB_PASSWORD::dbpass'
    'DB_HOST::localhost'
    'DB_CHARSET::utf8'
    'DB_COLLATE::'
    'AUTH_KEY::put your unique phrase here'
    'SECURE_AUTH_KEY::put your unique phrase here'
    'LOGGED_IN_KEY::put your unique phrase here'
    'NONCE_KEY::put your unique phrase here'
    'AUTH_SALT::put your unique phrase here'
    'SECURE_AUTH_SALT::put your unique phrase here'
    'LOGGED_IN_SALT::put your unique phrase here'
    'NONCE_SALT::put your unique phrase here'
    'table_prefix::wp_'
    'WP_DEBUG::false'
    'WP_AUTO_UPDATE_CORE::false'    
)

for index in "${array[@]}" ; do
    KEY="${index%%::*}"
    VALUE="${index##*::}"

    if [ -z "${!KEY}" ]
    then
        declare ${KEY}=$VALUE
    fi

    sed -i -e "s/{$KEY}/$VALUE/g" wp-config.php  

done

exec "$@"