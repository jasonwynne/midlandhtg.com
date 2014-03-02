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
define('DB_NAME', 'midland');

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
define('AUTH_KEY',         'qHc>fkL,p/&0pO+9@su/IWbSz,r#uj?z+xdjfL&V*p/7%H]EEc}wi}e!@IQ41`rv');
define('SECURE_AUTH_KEY',  '4vSj<U.aY|c4WtT+Nh{X%7)$7n%y&P_9uNxEz3%:3-}qz~~emTshf<?]Bb<}``q9');
define('LOGGED_IN_KEY',    '63{v*XxugGzR`eD:{>bv9?VM{+,u4GN)l*^%mH4BmP{!0j%>86jg-/W(T_7O3pnd');
define('NONCE_KEY',        'mvdM=(|:6GocK4{Otu;oJZhFGaFCbnwqHX!b*kT{{!0M;863>{gQ~hJ2edYm5]o3');
define('AUTH_SALT',        '#JPK/)*ha[!Hw>m5$e_2]?C9l*w-R`/3E*~1wTy!g}r/);#GcZ_M(]w=CnDh}Zq)');
define('SECURE_AUTH_SALT', 'w@/[@T`mbueYGxdWHGvgEVr++i<T0fumM:SQEL)Tj)8y;dRnI(0+Z:buGlI9+VYu');
define('LOGGED_IN_SALT',   'a5X m|bJ>#/|H&`Hu5onF^X>Qc-d7/U@=&GR4nq`I/6IUb]y%9Bi>04TanyA7xWw');
define('NONCE_SALT',       'Ge&DdwiC`-uJo9)wMAwhQ(J$iOM);KWEEf d6+deo2W^aI6^(3xG+>D=$6=%y+[|');

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
require_once(ABSPATH . 'wp-settings.php');
