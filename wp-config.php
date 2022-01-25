<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Determine Environment from Server Name
 * * Set Global Constants
 * * Set Environment Specific Constants
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

/* STEP 1: DETERMINE WP ENVIRONMENT FROM SERVER NAME */
switch(true):
    case ( false !== strpos( $_SERVER['SERVER_NAME'], 'my-domain-name.local' ) ):
        $env_type = 'local';
        break;
    case ( false !== strpos( $_SERVER['SERVER_NAME'], 'staging.my-domain-name' ) ):
        $env_type = 'staging';
        break;
    case ( false !== strpos( $_SERVER['SERVER_NAME'], 'my-domain-name.com' ) ):
        $env_type = 'production';
        break;
    default:
        die( "Could not determine environment type from servername ( {$_SERVER['SERVER_NAME']} )... Check the wp-config.php for typos." );
endswitch;
define( 'WP_ENVIRONMENT_TYPE', $env_type );
/* END STEP 1 */


/* STEP 2: SET DEFAULT CONSTANTS */
define( 'AUTOSAVE_INTERVAL', 300 );                         // auto save every 5 minutes
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );
define( 'DB_HOST', 'localhost' );
define( 'DISALLOW_FILE_EDIT', true );                       // enable/disable theme and plugin editor
define( 'EMPTY_TRASH_DAYS', 7 );                            // empty trash once a week
define( 'ENFORCE_GZIP', true );
define( 'FORCE_SSL_ADMIN', true );
// define( 'WP_ALLOW_REPAIR', true );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );                   // ALLOW UP TO AUTO-UPDATE
define( 'WP_MAX_MEMORY_LIMIT', '512M' );                    // admin memory limit
define( 'WP_MEMORY_LIMIT', '256M' );                        // front-end memory limit
define( 'WP_POST_REVISIONS', 3 );                           // number of post/page revisions to retain
//define( 'WP_TEMP_DIR', dirname( __FILE__, 1 ) . '/tmp' );

// MULTISITE CONSTANTS
define( 'BLOG_ID_CURRENT_SITE', 1 );                        // WHICH BLOG IS THE MAIN SITE
define( 'MULTISITE', true );                                // ACTIVATE MULTISITE
define( 'PATH_CURRENT_SITE', '/' );                         // URI PATH FOR MAIN SUBSITE
define( 'SITE_ID_CURRENT_SITE', 1 );                        // SET MULTISITE DEFAULT SITE ID
define( 'SUBDOMAIN_INSTALL', false );                       // MULTISITE IS CONFIGURED FOR SUBDOMAIN or SUBDIRECTORY
define( 'WP_ALLOW_MULTISITE', true );                       // ENABLE MULTISITE

// WP SMTP CONSTANTS
define( 'SMTP_AUTH',    true );                             // Use SMTP authentication (true|false)
define( 'SMTP_FROM',   'email@my-domain-name.com' );        // SMTP From email address
define( 'SMTP_HOST',   'smtp.gmail.com' );                  // The hostname of the mail server
define( 'SMTP_NAME',   'My Domain Name' );                  // SMTP From name
define( 'SMTP_PASS',   'smtp-password' );                   // Password to use for SMTP authentication
define( 'SMTP_PORT',   '465' );                             // SMTP port number - likely to be 25, 465 or 587
define( 'SMTP_SECURE', 'ssl' );                             // Encryption system to use - ssl (465) or tls (587)
define( 'SMTP_USER',   'email@my-domain-name.com' );        // Username to use for SMTP authentication

/** SECURITY SALTS
 * These can be changed at any time, doing so will auto-logout all users 
 * @link https://api.wordpress.org/secret-key/1.1/salt/
*/
define('AUTH_KEY',         'h;$NUrr^!NOm]JxP*=WT>;.x-dMH*_}}|`}P|L-[nTni3Da[}3%k( x5[O^PL-EV');
define('SECURE_AUTH_KEY',  'n-|>-X)B4<.?Fm40sx@o-n<$S|(^(swI:R.h*-2~0,J6/2F*3BEi_aoEt2&V?%%2');
define('LOGGED_IN_KEY',    '=4)M`Sv{`I=-t.6Y+3]Nb<B~ya:{=|Vu^q{ m@dF8j{xA^V08}p+%VaO+j#hb|7C');
define('NONCE_KEY',        'zsa/_P/}3xn|H~y4J|;J$?~ww6Dn)3:w`#({.,6fK`}h8`b$2&uP8.N{+.`X:vZH');
define('AUTH_SALT',        '8j5cwnaUGTE:hz}#^`$1mo,-G+M7Gm^ R9Xc*E1G2zN>7%kfPL&kvWG(ryFIC>L/');
define('SECURE_AUTH_SALT', '528LFJ1H-+|||3^9e^#@x1yhd3`xnFxTXS_3iDdmE(}OSM}sG>[_;II:n=1r]#_8');
define('LOGGED_IN_SALT',   'aH;$U_~:W{0@v!wQ?.Uu[|y*MHmrXw#*kaK+0-95B0+KcM?f#8[erft<_ej20=l0');
define('NONCE_SALT',       '$^]0/SQz_wYD9iqlFYc3;GvffR`viORDU6RTB7Cx_yP7gS:Cv}X_.ow&m>V|D-6=');
/* END SECURITY SALTS */

$table_prefix = 'wp_';	// DEFAULT TABLE PREFIX... Can be changed based on environemnt type in next section
/* END STEP 2 */


/* STEP 3: SET CONSTANTS FOR ENVIRONMENT TYPE */
switch ( WP_ENVIRONMENT_TYPE ) {
    case 'production':
        define( 'COMPRESS_CSS', true );
        define( 'COMPRESS_SCRIPTS', true );
        define( 'CONCATENATE_SCRIPTS', true );
        define( 'DB_NAME', 'my-database-name' );
        define( 'DB_USER', 'my-database-username' );
        define( 'DB_PASSWORD', 'my-database-passwd' );
        define( 'DOMAIN_CURRENT_SITE', 'production-multisite-root-domain' );
        define( 'SCRIPT_DEBUG', false );
	define( 'SITEGROUND', true );					// FOR SITEGROUND MANAGED HOSTING
        define( 'SMTP_DEBUG', 0 );                                      // DO NOT DEBUG SMTP
        define( 'WP_CACHE', true );
        define( 'WP_DEBUG', false );
        define( 'WP_DEBUG_DISPLAY', false);
        define( 'WP_DEBUG_LOG', false );
        break;
    case 'staging':
        define( 'COMPRESS_CSS', true );
        define( 'COMPRESS_SCRIPTS', true );
        define( 'CONCATENATE_SCRIPTS', true );
        define( 'DB_NAME', 'my-staging-database-name' );
        define( 'DB_USER', 'my-staging-database-username' );
        define( 'DB_PASSWORD', 'my-staging-database-passwd' );
        define( 'DOMAIN_CURRENT_SITE', 'staging-multisite-root-domain' );
        define( 'SCRIPT_DEBUG', false );
        define( 'SMTP_DEBUG', 1 );                                      // for debugging purposes only set to 1 or 2
        define( 'WP_CACHE', true );
        define( 'WP_DEBUG', true );
        define( 'WP_DEBUG_DISPLAY', false );
        define( 'WP_DEBUG_LOG', true );
        break;
    default:
        define( 'DB_NAME', 'my-dev-database-name' );
        define( 'DB_USER', 'my-dev-database-user' );
        define( 'DB_PASSWORD', 'my-dev-database-passwd' );
        define( 'DOMAIN_CURRENT_SITE', 'dev-multisite-root-domain' );
        define( 'SCRIPT_DEBUG', true );
        define( 'SMTP_DEBUG', 2 );                                      // for debugging purposes only set to 1 or 2
        define( 'WP_CACHE', false );
        define( 'WP_DEBUG', true );
        define( 'WP_DEBUG_DISPLAY', false );
        define( 'WP_DEBUG_LOG', true );
}
/* END STEP 3 */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

if( defined( 'SITEGROUND' ) && SITEGROUND ):
	@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
endif;
