<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vidm_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Js2@(<}6L3.eNR^BHTuIuL-E}Efc!aTHgC`yj<+k_&6|v|z_2cf9p9M3(Uf>70Y^');
define('SECURE_AUTH_KEY',  ' 9rfqq(=O6]:#R=bqmEC/iA_K4`InB1[M[mB ~Z-rXh6-THWC=ZNfh|-.ruY_gh-');
define('LOGGED_IN_KEY',    '?];RH_b-l$U#@&joPLH+(f)rF3;O?(a9So2SyU_@*(6:_ ek*CfuqqYs^V$.DSci');
define('NONCE_KEY',        'j&<6gTyPhJYHnPKkX>,PUz=@ou* +&([u41BM_@7 *q<pON+9T7yGH{ZrE536Ffj');
define('AUTH_SALT',        'u9p6[f:Rru!;E (XKCfX-)|NZ/y!/ Zsp:U<_LgaJp_dYFtB|mLOtI{<nHJLZv9d');
define('SECURE_AUTH_SALT', 'c~`p%gx2g+FA-8--@ gEc[E6gd7~h!.>b*zn8BLze8-yuE ](T0S_vN+6z)9 o#d');
define('LOGGED_IN_SALT',   '!:d4aTl7k0Tv/VLyF16L6v*Z+.=PeRX|mxE>|i$}`eR-{=9,>Ru|%LO(e5P4|n$~');
define('NONCE_SALT',       '^$<fHiw)f4S0R-mfVd .}{Y5*JZ-qK/1o+!|t@gMpfFKBF?wl|oF-P-j<wl~2{;Q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');