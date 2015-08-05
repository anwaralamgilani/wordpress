<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress1');

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
define('AUTH_KEY',         'dbOS%.l:q!GXw^JVSVZ$Zy;y<m,Do.rcteGps<w #BN97>U3nt#.X|>3mwr);LbA');
define('SECURE_AUTH_KEY',  'Z?ZM<0h7^{w>ng=}td!JoVhJ1ed35,O6B3zvtt#GN&Pu`qXisMcUq)RF7,&e`#UR');
define('LOGGED_IN_KEY',    'OoOyVk[H|%et`tdO*gxmUA{<BB734Gk][m-9Y]PC}E=hs0hYG=&>]8~W}}JYSMly');
define('NONCE_KEY',        'oSEW.>t0uk%VqpDZL!fkA_SY{*<.EhKzyaN+L18Ysg.^h>^hFX__iwC+GJHJLe)i');
define('AUTH_SALT',        'bhol[_0!)sT8y(<+OSZdye0B/Rm8,*a+6-ZG2&b9i$5:)O$_V*=$#C/_#V]}yi:#');
define('SECURE_AUTH_SALT', 'U#?3<-R~e&I-PkKn0k]*d%h:CW+#g82jYuD~wY>XWTOZoKM5;}]uL5nfu;zw$Z`x');
define('LOGGED_IN_SALT',   'LPMnj4H^CjNlA@y=h{X6-/ti^dBG{RU9 ]MOn)6+z6+xN{%`-QE>=uUBrg9}y4.S');
define('NONCE_SALT',       '<T3}e#d&Q (Z<+>WO]])4RYpodkQZ;2r5gz+A-NU~V+erYIXm+LAeq.[n=ttoNGW');

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
