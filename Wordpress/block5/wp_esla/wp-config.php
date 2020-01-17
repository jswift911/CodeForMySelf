<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_esla' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&e&h_8bYzt}~%lz-xCvkbbPBxHEBS*Djhmb+LV/l0uS%LS-Dx<8:%-0,GhOyup_ ' );
define( 'SECURE_AUTH_KEY',  'vLqz<L>rUy3@:tc&f^R`}>>qsB5^pz:H0MCI?Q8r?uKFEhnz><Z>.Hni,)*FIv<+' );
define( 'LOGGED_IN_KEY',    'Xaa!S6nk$W[ufRp{,Dd<p7;5(8-!y_Bam=Zq`BVA_Cc $1KLJCN8b`?<[1>??-Q_' );
define( 'NONCE_KEY',        'M~Nb}7tO=;LG1.|DxWgi}D6vG#_J-Z=sy]LAf_g>M[!n9y6c;<>bE2MkHN8@hXFU' );
define( 'AUTH_SALT',        ' |;b{rx/W~]=sKWdVyloMQF!!``_#KTJ5SHPDW0pMQ|Pb%;zM/-Oy.e|sV^Zc}/v' );
define( 'SECURE_AUTH_SALT', 'mnR07u{*!]4R`pVnZi.?y*<pkDs33+9ityQTr0P7:1GB{9J,];nwz9H%j} 8VUwl' );
define( 'LOGGED_IN_SALT',   '6{Xn,1oTwHoKf;yeKE~-^r=zToJ YZFTbk83wm_Qi6`cZte1WY^P8=|t$/J,ldrq' );
define( 'NONCE_SALT',       '7={}rXN0D`/{Tw;JlfzI{B^Z2vp:6vS%/D{pWp~?i;AfEfYm3{d#&Ig:+M?Gnckb' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

define( 'ALLOW_UNFILTERED_UPLOADS', true );