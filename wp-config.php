<?php
 
// Use these settings on the local server
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
  include( dirname( __FILE__ ) . '/wp-config-local.php' );
  
// Otherwise use the below settings (on live server)
} else {
 
  // Live Server Database Settings
  define( 'DB_NAME',     'insert remote db stuff');
  define( 'DB_USER',     'insert remote db stuff');
  define( 'DB_PASSWORD', 'insert remote db stuff' );
  define( 'DB_HOST',     'insert remote db stuff'  );
  
  // Overwrites the database to save keep editing the DB
  define('WP_HOME','insert remote site url');
  define('WP_SITEURL','insert remote site url');
  
  // Turn Debug off on live server
  define('WP_DEBUG', false);
}

$table_prefix = 'client_';

// Usual Wordpress stuff - Dont overide the ones you have already
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY',         'vdLZVlO=)k]v%SV(h4j[XbpYg6p7 c&&-!]uTeZE>^6|#YO7y]uO)vHJ,<&DnsQn');
define('SECURE_AUTH_KEY',  'Z ;|z4a3KE1;AiZ&S#xpaMd H Ud9_Z`uKdZ1wbJv--?l#K6Og8dF:&QHIt}JdT/');
define('LOGGED_IN_KEY',    'R$pjq%0Y/RI1rJ;fgIo)QO_k*I qYkyiOkn9JO>$js$RapMvMpJTKTj5O,*)%r|o');
define('NONCE_KEY',        '|i`:&Hu5()T5o*+6SlpS!OjdehAe,O`sXwf13k4tNEKv<f_`5sL58i*MHq{r~XU|');
define('AUTH_SALT',        'D+[I.SNq!c[h~dB%-NRdp%tIc4y>esp#rO8* 83.0,}%y:r2Gjww2/*IR5zeLO]l');
define('SECURE_AUTH_SALT', 'XGY|,WKm7=SkQNUt4f[4]#WMF-M`sgp5D.zNq/Qg/rdJgLVUAP$[syD7p*eVXL!U');
define('LOGGED_IN_SALT',   '8|^HUX9,$q{~6^;la!S%RsIB1g-jZn_)*U:3F[5f&$#H.Ck|%+CUQ|VtCC`L5qAB');
define('NONCE_SALT',       '!Vm3^y2V-~STD-pu#&P^ K=rw_J.cl<9q07ks&`D-a]@ <yu?3nSpTUmON[Ol`x2');
 
define('WPLANG', '');
 
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
        
require_once(ABSPATH . 'wp-settings.php');

