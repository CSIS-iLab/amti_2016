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
define('DB_NAME', 'amti_git');

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
define('AUTH_KEY',         '^J;pi.YyZL-?B,V5vz*Y^leaeOZ/T+w71BXy(T,m,eEsErL?TLDvzN=LGvnGk73!');
define('SECURE_AUTH_KEY',  '%E:;S`3/:a8EQ6MccQ:HGSM;CDVkf8eR=<@gCer2{P;5?p.y Bu@S|/C6TAh~ci8');
define('LOGGED_IN_KEY',    '$?yF!!<E-CK;l.mrfEA0`H04y={t:7>z-A0O(34nm.~H0hJuxct=ENo4%-u5}MWu');
define('NONCE_KEY',        'EpGQ#T4mRZIA[i*$cR4Q`Q#csQYPU-FGZo3X7) Mm}r`bVzktn%X)/,<wg92|QQk');
define('AUTH_SALT',        'an3Wez~f;xhf&t,f2(9Fg5W>SX0huqx<X*]3#2h3xQ?=G;;}G*Ay@11 w_g#C@LO');
define('SECURE_AUTH_SALT', 'yi1a KeJgE`uC`Z]+:>5f#6N</H#a/Fyu4|wVE(H%zpz]2&7`&b-_PCU<0z:933k');
define('LOGGED_IN_SALT',   '#AcnHP7+]*}JpuDMZl,qRm?%yaBPacR>%YgAc22mlTBl0&E]UgXu:B[$&j;]9R39');
define('NONCE_SALT',       'b6PR?`&u(*]Wy}Tw$vZu(^GB3nkvGH@Qrp^hc!dw6s{rQF^0>hHdI.NhBcj6BRsb');

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
