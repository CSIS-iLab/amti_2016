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
define('DB_NAME', 'amti_2016');

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
define('AUTH_KEY',         'WP=%(LDmhdKiAwVbl/FV9)KiFt}>fp1HqGxSPLUm-%PW}c$CQDZWtJ rdEJQH>.V');
define('SECURE_AUTH_KEY',  '[bIb>B3|}c=&U|3d*:LW.gB+1sVOb)i`iarh[q+Iv=Jf&;/%<KtL=ahhPGaE}cKg');
define('LOGGED_IN_KEY',    'Q m= 9RK}:G>RelA!o{If+$&X/G|:&aZcRl,!x^:Ns-y9%n*.Cg[q1i?%vBn?gB^');
define('NONCE_KEY',        ';tlN$Cca[~/]c[s4?eLy-[R!x]zmm`j}n)YsQ1T@c/tCC%_+NoK5~i?ezfdL-Z f');
define('AUTH_SALT',        '@HM3]g61bNeu&>1.[_ YxVjQ9sbuhrZuv=1Q>=99sY?9~u--WWU[hz<-_bKJq*$e');
define('SECURE_AUTH_SALT', 'o}6HeZr(MK_)bhJ3XY{29H_oZD8XI,Z*S/d,Pv~FNw~,-H]qWK@V5^`i[gK_2(?&');
define('LOGGED_IN_SALT',   'O%R~6.^CE^ED?hOgzB60YY8`1u~4$hC_,6j9mi&E3C!]4zG1JnHoe|]AVUvm#]`z');
define('NONCE_SALT',       'RNw7LKa<r=Su}G#?fzaNmN27we$MsNo=:O@$kT,a*/ZvNNZGer?uD+,`2>6#omD>');

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
