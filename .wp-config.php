<?php
/**
 * The base configuration for WordPress
 * @package WordPress
 */

/* Environments */
$envs = array(
    'development' => 'http://sage.lan/',
    'staging'     => 'http://staging.example.com',
    'production'  => 'http://example.com'
);
define('ENVIRONMENTS', serialize($envs));

/* Define which environment is used */
define('WP_ENV', 'development');

if ( WP_ENV == 'development' ) {
    define('DB_NAME',       'DB_NAME');
    define('DB_USER',       'DB_USER');
    define('DB_PASSWORD',   'DB_PASSWORD');
    define('DB_HOST',       'localhost');
    define('DB_CHARSET',    'utf8mb4');
    define('DB_COLLATE',    '');
    $table_prefix  = 'TABLE_PREFIX_';
}
elseif ( WP_ENV == 'staging' ) {
    define('DB_NAME',       'DB_NAME');
    define('DB_USER',       'DB_USER');
    define('DB_PASSWORD',   'DB_PASSWORD');
    define('DB_HOST',       'localhost');
    define('DB_CHARSET',    'utf8mb4');
    define('DB_COLLATE',    '');
    $table_prefix  = 'TABLE_PREFIX_';

    /* FTP */
    define( 'FTP_USER',     'FTP_USER' );
    define( 'FTP_PASS',     'FTP_PASSWORD' );
    define( 'FTP_HOST',     'FTP_HOST' );
    define( 'FTP_SSL',      true );
}
elseif ( WP_ENV == 'production' ) {
    define('DB_NAME',       'DB_NAME');
    define('DB_USER',       'DB_USER');
    define('DB_PASSWORD',   'DB_PASSWORD');
    define('DB_HOST',       'localhost');
    define('DB_CHARSET',    'utf8mb4');
    define('DB_COLLATE',    '');
    $table_prefix  = 'TABLE_PREFIX_';

    /* FTP */
    define( 'FTP_USER',     'FTP_USER' );
    define( 'FTP_PASS',     'FTP_PASSWORD' );
    define( 'FTP_HOST',     'FTP_HOST' );
    define( 'FTP_SSL',      true );
}

/* Custom WordPress URL. */
define( 'WP_SITEURL',     $envs[WP_ENV] );
define( 'WP_HOME',        $envs[WP_ENV] );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't6:^*F dG/iqr9:UvC6Jc`dOYMqgQzQ@H6aD@|@j=Yxi^Y9K${q17CI`7/C38S/r');
define('SECURE_AUTH_KEY',  'rEVOE5Gq$dX0`78QHaFKfPVl8J3qA{<Q4RFYGt@7Q5DJw6tHE}eC(-Rv=6C@`b>t');
define('LOGGED_IN_KEY',    '+ZCL1_MA1?YhcQf9.(EUE_b=KJxghj+aH;vX#dDE0x)]RfcNsW/sP+* a1/yuVRi');
define('NONCE_KEY',        '9XJSfYL}zEd)N@dqkJGz9Eja[&] kcdoFJv=j*Ho(5nH18cZ (WkhXh&.C)G_L&%');
define('AUTH_SALT',        '-%S{hI}gNM9lcLWc> |z/~$km=})MbI:u#ShflNg;B8#z5EG0Q^)TCB>:yOfFL=/');
define('SECURE_AUTH_SALT', '9{d>bg:ui@t%!<9NnTtldhzs,U6k4h#@y#.M:Y_5RkFM|[$$9zzl)%X%EHcoY:em');
define('LOGGED_IN_SALT',   'z/%gM9Y:;ADD{kc}ZO-a6qvC:>${_1xxr$`A)O%hXyld7 UUq-|,BINM0v]<3+!o');
define('NONCE_SALT',       'Kx!!2lmG GHX?r%|Y+E`^IiE@*uW6d]fT4c$`Za2I<P|~7WnjI7SE8HtOyS!-7q]');


/* WordPress debug mode */
define( 'WP_DEBUG',         true );
define( 'WP_DEBUG_LOG',     true );
define( 'WP_DEBUG_DISPLAY', true );

/* Files edition */
define( 'DISALLOW_FILE_EDIT', true );

/* Specify maximum number of Revisions. */
define( 'WP_POST_REVISIONS', '100' );

/* Compression */
define( 'COMPRESS_CSS',        true );
define( 'COMPRESS_SCRIPTS',    true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP',        true );

/* SSL */
define( 'FORCE_SSL_LOGIN', false );
define( 'FORCE_SSL_ADMIN', false );

/* Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/* Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
