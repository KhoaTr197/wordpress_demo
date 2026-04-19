<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         ']_x;+J^PZ$<qUMMW]2$_[ucxJv`U.AC(m,=381; 5%1Y7d`.$jCnT^A`UKj9h6y@' );
define( 'SECURE_AUTH_KEY',  '1UAdz&AWMV8q&5SpqUvFHp]vcft*|uYbPcHSC4OG4dt^=>b8~Q6wQv*)$K;{LP7B' );
define( 'LOGGED_IN_KEY',    'tizIE22]tlur$6XCA*>%0mPYq]7O9=aBGO]X5P*G+BRB)f+N#9#aUY7}1gW[<y6N' );
define( 'NONCE_KEY',        '60,Y(`JCf`!r;rq)$A :~)Pyzz~~*H_CN&nfB%KRbZv}sh:d>:PT%)}xF%m1pqtS' );
define( 'AUTH_SALT',        'V7 Mq(1IThS8ouQ~`{~^FjI^E8bpru_igAy(.47/hzD2J?IJ)~n@42(uP*SB}f2x' );
define( 'SECURE_AUTH_SALT', 'm2AnB,6N,PK_d&&N!+wbUO+GhHx[u@9{%R2._DQ*>K;}s=x^$CI++op}g@9/rEZP' );
define( 'LOGGED_IN_SALT',   'abS63;4@UyUSrmQpal%]@f_d1yS$~q/T_i<Y 4<]U06Nhv D2GiXC+[@HaTdfrYt' );
define( 'NONCE_SALT',       ';&[U0UiV)db0x&(j6?u:r,ywh):)MFPVLMFg(*^In{OK)f?3wz=lhvjb)7#[k0Lz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
