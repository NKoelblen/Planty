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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'planty' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         'no<VGi4.rxbN=d9wbJDnxShI|,Ho~$Cem[m$~|$G44UwBiivBx]NBKv:c{?+UVU)' );
define( 'SECURE_AUTH_KEY',  ',tC7$OCWX[RHg`9R FN}J<oO*,VRq1F!BTj8-z5vpG@dwh5T9CT9m<zrFq>UnP<d' );
define( 'LOGGED_IN_KEY',    'iyX!HmR@GDKC-bzmx-hDIrj0z7}b*%h>Vzlps9}A7=6RYg$B}{. icb9(.()g55~' );
define( 'NONCE_KEY',        '!?19>A9!@@hUf:V5#/k!0&@jubY:E2ngo:|R|*Ed;j0;e^8p+H#DugIgP[3v>!AZ' );
define( 'AUTH_SALT',        'B3r>+?n4g`Q29=mI#<BlK[V-wTNi8JM.{AJyP<Gg5/X<Z<.LkAR#ph0!8-S-Tq5I' );
define( 'SECURE_AUTH_SALT', 'k0|UQU#e=L0+*Zz3LZoP@anQ`9TI&U4#2GU@ .cOH!5%.slGt]xh}u#b1^O/L @_' );
define( 'LOGGED_IN_SALT',   '4fPi@Rl980q&xmkTqQ&Ypdml*KYjcF7lNj:w?n?qxcf&o{;9 HmXQ(DNw9s;p5((' );
define( 'NONCE_SALT',       '_%;Ou&rqC(aYK`5u1<:d];W&2$!=:IKXYw-[R~&X+|5.G`zlmDn|}/cX*[{)1@9T' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
