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
define( 'DB_NAME', 'fischer' );

/** Database username */
define( 'DB_USER', 'fischer' );

/** Database password */
define( 'DB_PASSWORD', 'fischer@1' );

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
define( 'AUTH_KEY',         'pmXoBs.i%: T.-rXPIE|zjed2O=(#E!Fn6:X#lRWP BA*e/5heK6!/gOx2T/}2.6' );
define( 'SECURE_AUTH_KEY',  '7Z0&QF$)lR+CP q9 wUP`|_@vAm4,+t:;/+8<[T:9eTgGh$3:MA,v7b-}#J.<zSf' );
define( 'LOGGED_IN_KEY',    'L;LF)I3){PNi0q.2th@TbJEMBd1Y-FWHdNjqxcG]ZaQ3ggM -V>>&8cuM$U[JTtf' );
define( 'NONCE_KEY',        ']cWT=izG/7v`FYE_;%>7?F#[zg x<mul&CnG/fk1okrXIkrUH{K6LVT%d@wVALrH' );
define( 'AUTH_SALT',        ');(:dZV&${_VnJ!=6a=Gn8tk96nvDM5v6Wob}lf}DJ~OZdWw]O:Vn=FJQv>3q&^!' );
define( 'SECURE_AUTH_SALT', '8(Y!=~}y&|QceeHjN`#Y5BX.f2DX~iV-W6!$vn>_dotKgRDqVhmT(O.QK1*zZGuM' );
define( 'LOGGED_IN_SALT',   '<EO}.N|D=k;3QyS<@8:zvr4C3;vlc2yUu1{e+l0#XvCa?nw0}v.OnhxiQLeqnvL+' );
define( 'NONCE_SALT',       'C;RMH750MS1>b)S7$x#>Uax{YVTloitaT{COuJOzl&-%E)jy+fpK!rZHqieP)ZyX' );

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
$table_prefix = 'wp_fischer';

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
