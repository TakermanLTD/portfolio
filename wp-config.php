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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbujnh6scqcyl4' );

/** Database username */
define( 'DB_USER', 'u48mrdjb6jhme' );

/** Database password */
define( 'DB_PASSWORD', 'ckua0bibfpqb' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'tYbw@g[cZl_pa Mck(Q,MVXU}XyOKM4w2-f AlpK0[`@T0?)lzj>UHJ=f`&4Y4(V' );
define( 'SECURE_AUTH_KEY',   'Nj{x+I!;[AP1.*;8YBuj_U*)Y3-TlEL&-]`fQDXHD$&WBv=`2MB=Rcj${!IoStOL' );
define( 'LOGGED_IN_KEY',     'unmQ,0_~G7Ba[{`_MR%OC*Ws+IZ0MO2Z7_0hJYk:Q2~U9waBHRyBP+in$Vi}nEH}' );
define( 'NONCE_KEY',         't6W:bG!?8t@wwzF4?^]G/oI2{u/S!DYvjW{N)5M]`2)*viom<T-?mPt`p6D,lIw<' );
define( 'AUTH_SALT',         'lQYIxK>s8+E<:N9R_qwIcqQ4>>G!KejCEc-I0ufD/9VIf2`nm/k2!A4K@(O7b&q`' );
define( 'SECURE_AUTH_SALT',  '_%(sXU/.:!|ru2xKVpa:9Zzibq`]>m>@E(QQ`i,=G-b(<[8GK:3Y$6N7]`m`4iA)' );
define( 'LOGGED_IN_SALT',    '7[R/H]:sIX1=W^ItpLL1Kp@yud58Bo#>9;441%!4oN<h|bW6y^TRIq_pCT&}VL(c' );
define( 'NONCE_SALT',        'NS ek$dgLwaZG2o?l9H_-[rV:o_U]`w2pwTvx -(T $&!,%`9(W674*(HvB$:EcL' );
define( 'WP_CACHE_KEY_SALT', 'Wj~t%<l506tvDpQ?:%9p]oq0shzTR<Q>4Dpb}vZYc]MWbU%R`hX*KG{EjZwm{pr.' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'idg_';

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
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
