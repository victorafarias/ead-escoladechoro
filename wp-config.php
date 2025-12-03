<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'club3372_eadescoladechoro' );

/** Database username */
define( 'DB_USER', 'club3372_eadescoladechoro' );

/** Database password */
define( 'DB_PASSWORD', 'eadescoladechoro' );

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
define( 'AUTH_KEY',         'W8a@I.^9re/kE54=qld+I)|m2}vZm[KHt/))|#]4<c7EO3_*gL_H+o=_B[Ps0})#' );
define( 'SECURE_AUTH_KEY',  'kloPfVvISv!$:qR}|6lj/mV7}31c$it)iE dNTUYN`~xM>]lb-me&BReB,F%DMQF' );
define( 'LOGGED_IN_KEY',    'YM34em4Ihz_e_#J2GI!Qpnf0!d:CTH[2ME=GOtTWp2:=i*dDDi&uM?sEg`:GCIcm' );
define( 'NONCE_KEY',        '5u_V5T 1nt}Qt,WFDtU%c%{0/krn:^ X|b/y@t)P)2B{pE)%)(cM9/x/ g~{MGJv' );
define( 'AUTH_SALT',        'A A.:^Kf#ss(+!8OUy[z*`qEc}Tyj7+8I[m2L|dMub^QRaCXpHh{^6fc9Bgz.7>4' );
define( 'SECURE_AUTH_SALT', '~/M$sC4(N|Hjv2Krp V-Z3[.]KE{/E/{oT$r1nzj*^l>T Pe0N6%{6L<*sP[: xi' );
define( 'LOGGED_IN_SALT',   'J;F{^E&X_i[*bu-Cyd_(&YQoK)T$0gJ#O/K2#oFd74) Q-D4fk>OErvb5Ps/Wvi?' );
define( 'NONCE_SALT',       'I~jsWa8/-C^A$*bG :*w?T=<t~W:y=0i`G/ko@>+XQrXrZmhfMm7H 2XiG-1]5)0' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true); // Opcional, evita mostrar erros na tela
ini_set('display_errors', 0);

/* Add any custom values between this line and the "stop editing" line. */

set_time_limit(300);
define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
