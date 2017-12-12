<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'WP_WTPRESS');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LBbZBA[3-FR]4 [et8lx7Rj/=|!_Zna~Ns@Fm]{g7QKJfd1v`vpt*aoI:~RQ,5Ed');
define('SECURE_AUTH_KEY',  'N7&koM|KT4b#rZ~4/O=+qhy63_DU|GCP#QP)9~I*6&!Y;WaT@.1Y44Gfs&>^VvDu');
define('LOGGED_IN_KEY',    '&[s 8-b|5,ze{n{p]vB7E1#rm vjNq`6~rXD&$%~mP4b.=6:`AtMjI)03ANvqg.A');
define('NONCE_KEY',        '?hY5pe,TF8h1I~dF=e=KJvuu4O?b]FNn?+?LV ]33>br3KiG@uPQK:<q]6u!IT%x');
define('AUTH_SALT',        '~+#=VG7Sr38uDz/sD4{%z2lx11x!zD5+Q6@_v_n><dXnLS^s9y{V!e`5l-w.tbta');
define('SECURE_AUTH_SALT', 'MoGb~95B+b/dE0E$J_3*Pyfe-DS9@Np=62dnqC7VMKBTiLHV[O&ly*q5A{/j&0T8');
define('LOGGED_IN_SALT',   'C%ov1PU;wQ$ll$e<FZL1PJT+t1*O4|]BgySpxxPwGCU,VFfhP()a$E*Q&};azMO1');
define('NONCE_SALT',       'Dr^B:$<ar`Ks~79X]&xT=Ci,zwXj[go7Ck6GKHXn[<mHZ^NMfG@^jCK9F*a0RNUV');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');