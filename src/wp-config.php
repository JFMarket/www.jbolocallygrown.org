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

/** MySQL database username */

/** MySQL database password */

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

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
define('FS_METHOD', 'direct');
define('AUTH_KEY',         '+TL^^@4j?-7kdP3.;%[.4<I[RQt,,fa1qfZ-5zP-O>yUz9ab ?+zkwyXc[twUKkJ');
define('SECURE_AUTH_KEY',  '`ccLB-Y-SEx]uBw!wk3;QPQ3sLSOnPBo CM,:>}Rr:1EeM>Ru9a2Z:z0Qip_UTwm');
define('LOGGED_IN_KEY',    'z)G4j#e@k *Amkd>RT !E}it`Gm:@Db|?xo4Bq(+D+?`~^3--UZS^rh6AF)87xdk');
define('NONCE_KEY',        'MwnU|@|Gx5#4<{nXGMVs_p`>L>] wd;N3d@mM~wx{TO81%~u^o@(_ov+h(jSKa,{');
define('AUTH_SALT',        'bY@J~@/+`FKY1JWs(;1ZF/Iekk-ZMc:ms&]6NK^A7Po|+ZOUr6|29^p@|O||WhiH');
define('SECURE_AUTH_SALT', 'g5(QL&Fct+bv[IqW|Sp%L.- ~Itj>zG?(!!Aw_;S-+q)iqV`,[+[<F$5)OI +r-j');
define('LOGGED_IN_SALT',   'y<m,4UFaAC0!cJ^rn]n-6b-qeoH5Jv-@osq4d$$WV,=ME/-#?-j1/s|lSp-=G?M5');
define('NONCE_SALT',       '|~9<rj))r|(2#e;fZwHh10-=/U)@A|`Hg4-sNDX7rBS{*Q_,~Ha|J*}&<(x+H(M9');
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'FcMjOPlwWu');
require_once(ABSPATH . 'wp-settings.php');
