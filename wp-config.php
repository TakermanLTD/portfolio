<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbtl9heqb7a1g5' );

/** MySQL database username */
define( 'DB_USER', 'u95bwhmmljvga' );

/** MySQL database password */
define( 'DB_PASSWORD', '2kgvuiffi6sc' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Y]}kV-;2LcAcR&/Vq%f3oia5bfHaIgQ5!_]Wrjlufgu>f}JAMj{Gjp_U1v&H%!x*' );
define( 'SECURE_AUTH_KEY',   'f1)5TI#qJZR5nwTADBr1~^o%[]!81E/[kgy`$K6(~lk*;KI5-~}rx(15|4Iw+KJy' );
define( 'LOGGED_IN_KEY',     'wy)fZpmYJ9,E^2^f}SPtCQ_t|&`<,zZA{*jZ+T_68Ip~;]&<Y7f7|(sI Odo5|.V' );
define( 'NONCE_KEY',         '<ri$I>!|45mmliks9*>X1(-E1T#Y+.&S9!h9=J.imu^e8Hz4U`RCV*b/19izzT/:' );
define( 'AUTH_SALT',         'sZqG7R|VoY<~GB7&h~7dq[%Tiaj<(o%&`0[no&isk@{2d(;o EJe%5.%OAk62i|C' );
define( 'SECURE_AUTH_SALT',  'r=@C>.P+@TAQ1B1Atn(XR jO;I.K}Q9!B!_:ylhu7C|/{86X$.1G4(7!Jhb8|qDx' );
define( 'LOGGED_IN_SALT',    'o>:RLC2WfO;;KX;z>|D|[.<TeGbia39B{tl+m`MuP,LD6]#Po/Cez~?XG!/0P(5w' );
define( 'NONCE_SALT',        'j[P_*UYV^^#fL7VY G!Z)#bR-%Y)4rQ%IB*oC=1W7I% +C#f%mO$wI#_XgdHQW*p' );
define( 'WP_CACHE_KEY_SALT', '+R<0{s_yA~2?SrvP:QkZd_^#l}#@Kfw>iNa)e&]m?_~[?XxrLXUhKwE`1w2,.Y[*' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'evf_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
