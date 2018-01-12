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
define('DB_NAME', 'dhis2_trainingportal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', ''); //jbr@17#@!

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
define('AUTH_KEY',         '9W([OKym|R};b#-m1Qb_7rK/6y{+Lws49-EtJwNW(0F=zpo/y`H<*y!#`DUOk(Z&');
define('SECURE_AUTH_KEY',  ',Z^b}rI~$z]fTVSrc|DQP6p@&]{vSwr2V(CSF1m4~db]JP`D9.X3ly6AWjw$Z=Tx');
define('LOGGED_IN_KEY',    '5v37oE<+pX H^m;)3e~Cf0dwV0^ST[$RPnI8ErM<q?SpKK;EWK$0[(_t&bLgW1WN');
define('NONCE_KEY',        'tk@VX9s:M)ce.i%<o-g-DtOP:[CVr-od:i$[-CpAO X?%W3@G3ykhfCiDQf6V<35');
define('AUTH_SALT',        '*fJ{2f%xcF$UCxU-!SDPKJ!F#FO: p8nmS%/IGGwC~:T0;up~J&MzzFEK%EYxYEZ');
define('SECURE_AUTH_SALT', 'JS-z!=m<6C~FFwnh`B:;VWcrY%d/R!DI_O)VYexE9TNPhCHqXysRKwD8bTG3y{7!');
define('LOGGED_IN_SALT',   'U+H2Z1qT(S4EJgd,H{TKrLAjCsLQ..9m(|r2k^MyfT/;TH2?(!WdB&iE}d>~,_Y*');
define('NONCE_SALT',       '8:}ne:s08#_,[dOUZe@Hf]|!Xy}T0dLN gWkuiRjg]>MeQ[^mOxv;L{&!x:6D-2:');

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
