<?php

$table_prefix = getenv('WP_TABLE_PREFIX') ?: 'wp_';

foreach ($_SERVER as $key => $value) {
  $capitalized = strtoupper($key);
  if (!defined($capitalized) && is_scalar($value)) {
    define($capitalized, $value);
  }
}

define('WP_AUTO_UPDATE_CORE', false);

if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
  $_SERVER['HTTPS']='on';

if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');