<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için 
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define('DB_NAME', 'wp_test');

/** MySQL veritabanı kullanıcısı */
define('DB_USER', 'root');

/** MySQL veritabanı parolası */
define('DB_PASSWORD', '');

/** MySQL sunucusu */
define('DB_HOST', 'localhost');

/** Yaratılacak tablolar için veritabanı karakter seti. */
define('DB_CHARSET', 'utf8mb4');

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-3]Q@gcFA()4uG/EfCJW>4NbZ>/f:^i*;OtN5s;0f@2s+af-X5>@X0sQ{7zUku=K');
define('SECURE_AUTH_KEY',  '8Kx)@B?l3aB$n&RB!@K.`]r<=v1sq#|<kAJ&b/q#Lr!|+G*,S,fOX1+7Qou+[?=C');
define('LOGGED_IN_KEY',    ':@UKJWU~V#$Pnks?}AyQxC.VFjo7*[J{&Y[SbT{UYYF@3#d0Ku^k}xn rhyD?xB?');
define('NONCE_KEY',        'uVml1r7Y^`JvV``}a{Xv{g8Bmf1.rh~Kv>gKQ?d8F]}2Y*bNFA|@3No:W~Op>0Hn');
define('AUTH_SALT',        '7PTEJn!hhH#(8CaN?PkZa&rl&n,Iy$n|KkpUCy0+-.k8bv?+jBBB.ARxL%WzgGk>');
define('SECURE_AUTH_SALT', 'BK`eY{>!S`[@oNOeqtvyg)f^1l.dVZIDXOp?GsO2eP9 $4r6ulU0?_rCa~5:wgB|');
define('LOGGED_IN_SALT',   'VGZ*g%=B]ug zb0$9!-@eZ/9Nq8+web?J;2#tCj~<k#^nh*+61}uH4y%~n;[4`*i');
define('NONCE_SALT',       '@l4RBN#H#6MX-NnGjmCeO]7`]#]{1G>qH0G0Y ]ic:9=vMFc<-X]b6F?<gequD;^');
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix  = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
