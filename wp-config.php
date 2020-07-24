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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'collec19_wp490' );

/** MySQL database username */
define( 'DB_USER', 'collec19_wp490' );

/** MySQL database password */
define( 'DB_PASSWORD', '5ZS6-zp82(' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zdkoqyibezz2dea02cknqonwdpijkjcopdcijd1fgmtmcnwvtjb9xypystzrksik' );
define( 'SECURE_AUTH_KEY',  'kzebouyeiqsnr3njitlq9w8rc7v6kwqvixqrrebv583nr9te3ht6njxri1ajtisc' );
define( 'LOGGED_IN_KEY',    'sbjsyrqfsnzjfytxhutavlwzpfj9ri11uz273gkbfj8klw1bpg1ajmyot8whdxky' );
define( 'NONCE_KEY',        'hgtrcwl8cijavugaocxsla937dgvckvsvig3eknmgggtwoqf2qrklymksdnzwws7' );
define( 'AUTH_SALT',        'nmjtmbnulvtwpk1q53ax8e5z04noydeqqsdrioca3earijxjhlcrlca3mzbxdjpn' );
define( 'SECURE_AUTH_SALT', '2p2uyzxdue1fr6xfryytxhllah2i8dbsvu4biquqbahjqw77xtomue6avksxxe4i' );
define( 'LOGGED_IN_SALT',   'qrbemkbauisvetlrthvzm2okg4bdrbiuwfpkeah7tbofibevgmpcbqhvrilnxsjn' );
define( 'NONCE_SALT',       'vlzljyucywstffzh5zse7i5cbmfyn5fit1gxsfjr8z72ihzeyfgzhulfpm2505cf' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpew_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
