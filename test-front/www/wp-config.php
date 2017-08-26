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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'adr' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'db.localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NT9d(6->a?S.>:uAsVL}!S~h{)5}A0Z;3z_mF=!/Qe{2^u*k~K7~B_N|ASGmC^>8');
define('SECURE_AUTH_KEY',  'Zn]{1}E6Mm?3-ETVr96d@~p_s%;8=Uq6z;p50A76zz-vMW}!op=8X`>-Ku)a4-p|');
define('LOGGED_IN_KEY',    'fBO?EYeltpnCI=ee9-F# gmAd%6s4N:K0=L5eV|mTFP94l>TXvg*yxCV(KzdFIn$');
define('NONCE_KEY',        '7VsOs9U/+Cj=tp|B|cK[Sw~`2Ki~f_j?K5rF`uNz+D8;;{C<bkr|NZ3UTDqZy<Fr');
define('AUTH_SALT',        '{5b^rK++n-K3]Qjm2+l$@UAsH:7TuO}b4>yU$)Mpg+v`B0y-=C`RMjTgJ`(;n3>o');
define('SECURE_AUTH_SALT', '-@6p[hk[C2*^Z2nZ,}yaE.I6G0OcQ+YX$eXI5g4,heMr|D<Ix4@PSTvbptxE5Yya');
define('LOGGED_IN_SALT',   '7(y*c.a:pd(vllmUOX i18LQM|/J*_R7Y|dz~SreeD|.viSVOk;XIMv=fM]-_6UV');
define('NONCE_SALT',       'GKX|y+^6zyMVc`+(MW_e|3|y_G8|OVx@bL]]eQWmO-1lN@EKaHaKAVr1QF/89]1d');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
