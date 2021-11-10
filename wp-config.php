<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')c`$<WKkqoZ:|5eRrvam/[F -~Qld00y |kOysk.Y9K^O@5~-fn2OV;:T%63eS=L' );
define( 'SECURE_AUTH_KEY',  '3~i}f1Ip&T1XWIa*)#hX_oDji?R}L4hd4xG?[+_Wg&Kc!UW^N`A{. S:4+Z12jFj' );
define( 'LOGGED_IN_KEY',    'Xi9etCSU2}0p(xoI$lE.0j;-?#1NAWJL=69P}%s8SJL IOCQ7P].1jidJZuFrcKc' );
define( 'NONCE_KEY',        'b0PM`|.p[^[94J_&l.1oiCnn]2S;`p=QCKWD~uzmZ1X{ {e~)$Z%@UH6(?dg+c[9' );
define( 'AUTH_SALT',        ':9gbhg?5VlUMxI~wV=j~.;?4t6Xy=QZfW4_LaE=fnVq0k7O ;lTU|nn<r[@R+@XD' );
define( 'SECURE_AUTH_SALT', 'o5/M@#;w|eR%9+&c{RIOort/n5SrKobPOL?{@V5F`AQMn^.c?2O|;#2}nw#/HP|C' );
define( 'LOGGED_IN_SALT',   'cXT5us7Id4*7w+MGM(f:^ujT8d#GtLf#h@*pHZ%q52P@o=b-G/AYjuWxnEsD<e3X' );
define( 'NONCE_SALT',       '*T8C(dnj&^a%fzw+pECZJFuNl)u`M_2!X_1KGi7CH_1&]rXx~QJ6DGOjUBS8*nRi' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
