<?php
# Database Configuration
define( 'DB_NAME', 'wp_amti2016' );
define( 'DB_USER', 'amti2016' );
define( 'DB_PASSWORD', 'WX2IYOo2ElThNc0Ta7Dj' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '5H*f3Q5fX^?>z^cRK6$c#H3Zr2ne|:<iF+l4@{F=g,kP+If?Vn?bn_fO-orttS&)');
define('SECURE_AUTH_KEY',  '4B^efJJYbU_[1<85w;gKv<G0&MGH!mqzVDM|jnYX$PJA Qk>-D=zS@C;m<MO5h,P');
define('LOGGED_IN_KEY',    '^Nf1LF]EE:8TH<7~s+u=gbIeG3)Ya[<N_l@];I,LLe~%B+SN?MDS?+dkfbg^JC~0');
define('NONCE_KEY',        '#Rsont(DMmml~f*B<$ciue9H@/bU:T$Z.g7qv8_N`OmH3+tTMAd[kS%>E?~+PPE7');
define('AUTH_SALT',        'ZvuCIJP=j|[n&Y;4a5T/ Jx0w@!V$@T?>8]i3UQ-Fox3ZL*,UsT$iUoJ<!HJtee5');
define('SECURE_AUTH_SALT', 'n`,y$NBBZc~i>1mkS>6By>,@P@!QD& 8JODGF2SFK{errj$epdB~Jt-r@h!e(<v>');
define('LOGGED_IN_SALT',   '|x6(^BvvnIE?-CBcr!(Lpo)-+6.*FmQDqNBpmU>bF2ij8}I>gryd!fbiNeCO&FML');
define('NONCE_SALT',       '>+HM[#4Y-e%(Y>h__ dg.|@Zw@_tXUqV[4Dft1CfSn+g-f<ZP4}CmR;J+^~04h7q');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'amti2016' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '89b0c51ff2a4a8179f09f1b237f03213ba2c1073' );

define( 'WPE_CLUSTER_ID', '30544' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '104.130.250.174' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'amti2016.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-30544', );

$wpe_special_ips=array ( 0 => '104.239.144.145', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
