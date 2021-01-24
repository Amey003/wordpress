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
define( 'DB_NAME', 'community' );

/** MySQL database username */
define( 'DB_USER', 'community' );

/** MySQL database password */
define( 'DB_PASSWORD', 'community' );

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
define( 'AUTH_KEY',         '0.VIo[rbkb^%YLf||,;b4(yC^C}rnT|WhG|%v;C=QvAj(TuvQhg;@YX-!H@zA`)_' );
define( 'SECURE_AUTH_KEY',  'Q.G]4xjmIzIh&;c-`*]Y/okC8I YMdCSmH2&gSq@8#9!6~CQW*m--f]@*UpT;9Ai' );
define( 'LOGGED_IN_KEY',    'm-TqgKm.>/odxHul7oE2ahFiU78I{goL n&^6N*1`Z[(!j9nu^a}E/FNNA`9SMSd' );
define( 'NONCE_KEY',        'j&oH;kpJi$cISJFpUkErxEG(k~(Lp*g_Zk&y4@(gt[S*iBQf4<W.Z50[d4wZdrd=' );
define( 'AUTH_SALT',        'yRJAnLS)*,7_9imF.[qS@ %U?kN;en/Y^8JOnQtPFPA{6(V(Ng|T:;x7g5S~t<iM' );
define( 'SECURE_AUTH_SALT', 'jTnJGqv DkypI4G}QY&v3x_`vT_#K1#kGm4_9tJ(%I`lCk`Egt8?ujt3OY5~rq0G' );
define( 'LOGGED_IN_SALT',   '2].GFhQ?4G4W,Ty}#!U=&tc_8sD8_b A1IAU[M%5u!1/ FKckBF#O/*dC%hxf!rM' );
define( 'NONCE_SALT',       '`I-b.~Ra`4 k{a4=-Xw`{=;CK0?L. fh*j p]aeZ^z15P:Ak7NgmA ZG2>4=_D03' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

@ini_set('upload_max_size' , '256M' );


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
