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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '6SXTWZO/+YdsQdE666++VMZpCdy77ShwIarm2iZb3PRNYNc068kaebmTtDPtVnh+w5iYVaPAhvpjPYRxgokM+g==');
define('SECURE_AUTH_KEY',  'DzAQ4nxqHCkoKfXnrDAK23Mj2xlnmlD+t9Xhi3uU1w1r6WUyAPgM15HFNyYT7DXB559XUjMYHlhnuf2mexdORg==');
define('LOGGED_IN_KEY',    'EGFXW/lhjG2LJiQIBlJiCw+QaA7MnZNG2BAWOOMNh4Zl5gLcqVV0fmHLg0FrLe5sHc1GDVCiw0DouyOww39TmQ==');
define('NONCE_KEY',        'q6eyGZiUM16+gasDXUGcJZU9sAhxR5eDipjTBji448iR4SlY/v+9YEMFL5A+jNherRAI7YikNLi4cQvewhQfxg==');
define('AUTH_SALT',        '1/WQUrjJ5Z51PP9wX266f7/Axe8TANLS7Y7wuWKvKNCnXtIkWqweCpJ3W78w1jyLcS3cDWKDtANrrBXZ4llBaQ==');
define('SECURE_AUTH_SALT', '2wDa/U71g5almrvtu7v3/D+/n0qW/34e/aYBRZ4cmy2EYWkxX79NV4PdIMDlwVfLDXrnl2gjLHmuC5nPzZseFg==');
define('LOGGED_IN_SALT',   'ZnuZDblc0BGyn8lPowF5PXyDDUNaiBhD7YvP6Y0kBTB4Mbhi4Sar39A8YJFTRffEaf5D+7lwEqT5ajpLG2iY2g==');
define('NONCE_SALT',       'vAsFBjDgMhtSkRqQyZOxERjg2Oi4xQ1/J+GVnUXftz9qkNBknCka4G9RogIt7huovdJ9WUbUMFV0X1feKlgLYQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
