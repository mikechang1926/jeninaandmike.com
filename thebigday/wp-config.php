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
define('DB_NAME', 'changmik_wp815');

/** MySQL database username */
define('DB_USER', 'changmik_wp815');

/** MySQL database password */
define('DB_PASSWORD', '95u6kuPSmf');

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
define('AUTH_KEY',         'wpe4f03byhlpcy8rhdpu2xbtluyrlnjupud0cx3behalahqbsedxveuaubnaa6w6');
define('SECURE_AUTH_KEY',  'zvoy0dwaedbsrqezdlb4xbcxhhy5wlu5orccgzgy3qxb0indhlq6dnz3lrhof7ga');
define('LOGGED_IN_KEY',    'rorilrczhgpo9yu5pzvsacirmlvqo5vqnvkni5p2hocfi2q6t9jdx9hbocplfmgl');
define('NONCE_KEY',        'ecjdcurniqit9ed07jzru6ukem3omntl3z4nwskad9k3vatb7hs5hwwfgbssswlf');
define('AUTH_SALT',        'trjeqtqhafe9bdxxvvxi4bkskphe4gynunau1iko8wpdwvyyqiw6w7dzyi767qye');
define('SECURE_AUTH_SALT', 'lwmjox5coqpokrfz3vuo9qtdrsnliuja8cv15hzzzsrlfogwcocastctrrijxn5j');
define('LOGGED_IN_SALT',   '5vfk5qrxxz7kkq7gyep17fhnqjuoaraildjwh4sphkcubkeg4azqnlquh5hucimi');
define('NONCE_SALT',       'luzoc2eusqieoscoxwaunpisytwhhicgseyljnjjdqwdtyf4roafaxmhllenpahj');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define ('WPLANG', '');

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
