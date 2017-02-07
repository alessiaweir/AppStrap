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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'strapped_app_17');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cau6}-!N+<s f K4?563Q+Rnh;(PzEO5D_zB,],8N+0(*4GiZNzA;F}x>@u/:AO[');
define('SECURE_AUTH_KEY',  '_~U*YU3++VPhTJ11NaX*5>#%#S9f}`!Lao_BTEtNR>jGPj1Zd@^oF[c$d6=Hd&`,');
define('LOGGED_IN_KEY',    'xFZJS1W-LKk1O&ze7Yk Tf(@uP?($.zvR>`7Y~t {]:FM}z!c08% wt~9*WhIH3z');
define('NONCE_KEY',        ' Ego}I@H<Aj4-ye*s;G5E(D?f}[ V_H.H6m;F|QA~-C.wrSqBt]:p6nGKGyOj<2~');
define('AUTH_SALT',        'Z.g,op9u<~EI]_~K5N!-_w-$<6y&;)tikm=5XCB!CpNHR(4Ya~0)Gh<*f*q5LZUK');
define('SECURE_AUTH_SALT', '3eBi/vnCI| U-@=Pge9X63K0V&};^VP#UlpRGPaR@,mR|m8{b6[!EL_ocyLQQk^X');
define('LOGGED_IN_SALT',   'C31hHGSSy&,8GcvS{2U!!9FCIt*ZD.Ia%r[g,It]Ym2pk 6^dX<h0fmj_-$,<%aF');
define('NONCE_SALT',       '}y I_wnw(>/}xwX3Ipeva3qH{e52U,0dF)q)-XRA$4}%JX:d[VI9E5(0eQZSVz..');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
