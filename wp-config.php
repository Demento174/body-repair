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
define( 'DB_NAME', 'infovokh_body' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'infovokh_body' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'HardPassword1984' );

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
define( 'AUTH_KEY',         'aBp;J6gU-Mb$_KtXUW3_Ls&ZNkjEDsI2U7eK=wy/Q}K-`Aph7#V?cq>R (Cx!P$V' );
define( 'SECURE_AUTH_KEY',  ')5p@t{iMwR%~zyF=j4>2+M>s,Bp$,>JZj*`u[.bL^R$W6^F4g,xZm,Nro*1P+o=s' );
define( 'LOGGED_IN_KEY',    '-ZsZ._5azQKx7JFR~FbgCYC8IPj/2-py-i*`u3sL;zSv6_=:,Un)]28/S}xk$4C:' );
define( 'NONCE_KEY',        'hO_mJDjv%<7#T`+|2%^u38|MaJR<Z{E@HDlYixVo4V$HI$7%NTeSIquFs<C~3:$8' );
define( 'AUTH_SALT',        'h(TKKM|%11zhXVX_tp|SCW)^92,Bi>fW)r2t8w#/?KXe<S*:=yQ+A13gL)qb[|io' );
define( 'SECURE_AUTH_SALT', '/A5 $/Lsex--vi=}&2:Q./B9Sfr1c>63tP;}d% UVxNqM2g<aECI#4O(LB0Xxl!t' );
define( 'LOGGED_IN_SALT',   'y|8#f<t143Y^%B}o+^iQPjYq^!;At)w@<0AV<~VL,J1fYY`ouCMI[e(PvvdjyxMO' );
define( 'NONCE_SALT',       '=j&jK;N{qo.trDjw[;SZFX6Qq/T%7yXSZr+x,,p*kZWed5K7;kM!{(Q]rq<3aYud' );

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
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
