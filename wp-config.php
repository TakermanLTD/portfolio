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
define( 'DB_NAME', 'takerman' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Hakerman91!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o7{__|zzdZ.8c5kP]oMN@.uBox=WrCX70W|5{))g0U]Eoa{aF<T+Pe mj/~.yVuF' );
define( 'SECURE_AUTH_KEY',  'oswe|63`z&16X_&ubB*dZtjACN[MSqPBU=~w672E^[GEdp]:#RJ=lB5js=e=}svb' );
define( 'LOGGED_IN_KEY',    'Q7)La%&/YZpzeO1^McglBXB|zsw|_1o7O%h9a{O,[(Xx*Uz}PBxsxQ>dr{UJ6RKR' );
define( 'NONCE_KEY',        'GlEQb:{$3r#5;2a}#t]/OYETN4<`+^cD!-55_l>ETeEm~UPLvM[RC(Mu/|gc)(TO' );
define( 'AUTH_SALT',        '&9MfwafkQre(8U*tnTTz4GZroVT<|u/c.++:,hJf`r^4;,ZWMZ+X9l)kU3?Z OEB' );
define( 'SECURE_AUTH_SALT', 's:<1H~<0r/4yX7S*?ZVqb)5m$B5,3 ]o,$uZiLg{%TO:2Oc4zq|`OpnE.8&j0(@D' );
define( 'LOGGED_IN_SALT',   'J2d)J2V|*.ZNOW%W4EuJDH7)Q[&3pSh-*#}2 {WxBw@.!*m&3#b<>.jpzN@qfA:>' );
define( 'NONCE_SALT',       'DQD`S&N{,&H<cQRI=iEb7&aJ<*_L!4K:4n-6%Dcg#dSz+u:3n<;m/VdTCg_u|tl<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tak_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
