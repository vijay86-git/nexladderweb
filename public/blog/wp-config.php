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
define('DB_NAME', 'blog_nexladder_tutorials');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Sam572#$');

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
define('AUTH_KEY',         '.^Zq:%|AQc9xD`PJ8?(@,z5)uQUx?D`hsHcjN=qW8ox019Z3{zHM)tFNsF:Edb@;');
define('SECURE_AUTH_KEY',  ')6.`qj:09^?M;L8Up) x4TVhfA`$y?<0;2?48Qi54Q7tA<Uk%l?[jhNe>loQBgd{');
define('LOGGED_IN_KEY',    'ppVPk!8XgF.xGPgvY->Q9{pu$KR8HpT.&6];x5.Al)^fU1D4hPPcq]&23H0GsALG');
define('NONCE_KEY',        '9.w)V8I}I!F~mp@m[=np[u^~g8*ST!s@J8jM 0j0h>MbPNRiNc<Ad5_17$Fwts~3');
define('AUTH_SALT',        '&0y,}W8Ik1Z rEJf<3Dv_)xf?daOM.J!wR5?3UQrm):jhGl^nTT&SV[m&I>/$>lC');
define('SECURE_AUTH_SALT', 'c,~+G@<O/WhaTcZicfC!n]YpD*;+=`tRO`[ezV+Odt#fH|zuz[eg&eQnBnlk2m2F');
define('LOGGED_IN_SALT',   'NHbT/Of~_H3ZjTQ0Fl_JTV M}uC>!B/FYcg`E+^f;~+Q/dH]P7.Xgx>J,vau+K<x');
define('NONCE_SALT',       'J<!s_p/m6>@Vu71D3:KJHZ)z-:E)}jd<^H: 8npmU&vugMCH/13=owhFb[Sz?=Xe');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tbl_';


// Disallow file edit
define('DISALLOW_FILE_EDIT', true);

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
