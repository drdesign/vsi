<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'vakkerIncDB');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'X3CwO|?uX<qI9SiF]%DwR}0Eo|dn-D=Tm,)SB6D_;zGm=T<j).pp&L{M4{~%~)1T');
define('SECURE_AUTH_KEY',  'N1FPD70<>y$y]V~L5O/d5{0(RDY=VG/m2IE&vC25ujAenge +sFhMq ?Gu|NzW{S');
define('LOGGED_IN_KEY',    '&$D[,rmmF+stawgY@#xpvDtc6QpY;(Ii2t.8Wss}UV1Q%QBZe5^{AHZO+SS4B&Fw');
define('NONCE_KEY',        '<m*e[d+~%d3cqcHPI$2ARkD 1$IuH KRKx<cRM:?x6&SuH+f-u<SU2fE2nr(iXrw');
define('AUTH_SALT',        'p{bDB^&O-]XTH5PYL<k2lFAw([GSc|^TW(8N`0qNG@:*DVs+#sKDM,Ir-M/I|yND');
define('SECURE_AUTH_SALT', 'KC2:H|e8|2Gc+#h=1-)Dk92b3vzN9,mq{2mR!SGqo8>W<bzzXs!*V?h|AVB<6[ 8');
define('LOGGED_IN_SALT',   'I9{*bz+h%*I[f=8/mY7bb--wo>6$klz[Mcz:T1Jd*l_>quI:7lziPVV><|Acd&Zy');
define('NONCE_SALT',       'vT6PcOL|=v+JP~,Rwm#aA6HzpgFEB?PLc`K[<L?N(?Zz=r3LV|:iU2<!mLhk[y63');

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
