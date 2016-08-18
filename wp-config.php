<?php

include( __DIR__ . '/local-config.php' );

def('WP_ENV', "development" );
def('CONTENT_PATH', "content");

def('DB_USER',      'TODO');
def('DB_PASSWORD',  'TODO');
def('DB_NAME',      'TODO');
def('DB_HOST',      'localhost');

if ( isset($_SERVER['HTTP_HOST']) ) {
  def('WP_HOME', 'http://'.$_SERVER['HTTP_HOST']);
}

def('WP_DIR', "/wp/");
def('WP_SITEURL', WP_HOME . WP_DIR);

def('WPLANG',  "ja");
def('ABSPATH', __DIR__ . WP_DIR );

def('WP_CONTENT_URL', WP_HOME . '/' . CONTENT_PATH);
def('WP_CONTENT_DIR', __DIR__ . '/' . CONTENT_PATH);

def('WP_POST_REVISIONS' ,false);

def('DB_CHARSET',   'utf8');
def('DB_COLLATE',   '');
def('TABLE_PREFIX', 'wp_');
$table_prefix = TABLE_PREFIX;

# https://api.wordpress.org/secret-key/1.1/salt/
def('AUTH_KEY',         sha1(__FILE__.__LINE__));
def('SECURE_AUTH_KEY',  sha1(__FILE__.__LINE__));
def('LOGGED_IN_KEY',    sha1(__FILE__.__LINE__));
def('NONCE_KEY',        sha1(__FILE__.__LINE__));
def('AUTH_SALT',        sha1(__FILE__.__LINE__));
def('SECURE_AUTH_SALT', sha1(__FILE__.__LINE__));
def('LOGGED_IN_SALT',   sha1(__FILE__.__LINE__));
def('NONCE_SALT',       sha1(__FILE__.__LINE__));

def('AUTOMATIC_UPDATER_DISABLED' ,true);
def('DISALLOW_FILE_EDIT'         ,true);

switch (WP_ENV) {
case 'development':
  ini_set('display_errors', 1);
  def('SAVEQUERIES', true);
  def('WP_DEBUG', true);
  def('SCRIPT_DEBUG', true);
  break;
default:
  ini_set('display_errors', 0);
  def('WP_DEBUG_DISPLAY', false);
  def('SCRIPT_DEBUG', false);
  def('DISALLOW_FILE_MODS', true);
  break;
}

function def($key, $val) {
  if (!defined($key)) {
    define($key, $val);
  }
}

require_once(ABSPATH . 'wp-settings.php');
