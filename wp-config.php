<?php

define( 'DB_NAME', '{DB_NAME}' );

define( 'DB_USER', '{DB_USER}' );

define( 'DB_PASSWORD', '{DB_PASSWORD}' );

define( 'DB_HOST', '{DB_HOST}' );

define( 'DB_CHARSET', '{DB_CHARSET}' );

define( 'DB_COLLATE', '{DB_COLLATE}' );

define( 'AUTH_KEY',         '{AUTH_KEY}' );
define( 'SECURE_AUTH_KEY',  '{SECURE_AUTH_KEY}' );
define( 'LOGGED_IN_KEY',    '{LOGGED_IN_KEY}' );
define( 'NONCE_KEY',        '{NONCE_KEY}' );
define( 'AUTH_SALT',        '{AUTH_SALT}' );
define( 'SECURE_AUTH_SALT', '{SECURE_AUTH_SALT}' );
define( 'LOGGED_IN_SALT',   '{LOGGED_IN_SALT}' );
define( 'NONCE_SALT',       '{NONCE_SALT}' );

$table_prefix = '{table_prefix}';

define( 'WP_DEBUG', {WP_DEBUG} );

define('WP_AUTO_UPDATE_CORE', {WP_AUTO_UPDATE_CORE});

if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
  $_SERVER['HTTPS']='on';

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once( ABSPATH . 'wp-settings.php' );
