<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc. ç
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 * *******************************************************************************/

$mod_strings = array(
	'LBL_BASIC_SEARCH'					=> 'Recherche rapide',
	'LBL_ADVANCED_SEARCH'				=> 'Recherche avancée',
	'LBL_BASIC_TYPE'					=> 'Type de base',
	'LBL_ADVANCED_TYPE'					=> 'Type avancé',
	'LBL_SYSOPTS_1'						=> 'Choisissez l\'une des options de configuration système ci-dessous.',
	'LBL_SYSOPTS_2'                     => 'Quel type de base de donnée sera utilisée pour cette installation de SuiteCRM ?',
	'LBL_SYSOPTS_CONFIG'				=> 'Configuration système',
	'LBL_SYSOPTS_DB_TYPE'				=> '',
	'LBL_SYSOPTS_DB'					=> 'Préciser le type de base de donnée',
	'LBL_SYSOPTS_DB_TITLE'              => 'Type de base de donnée',
	'LBL_SYSOPTS_ERRS_TITLE'			=> 'Veuillez réparer les erreurs suivantes avant de continuer :',
	'LBL_MAKE_DIRECTORY_WRITABLE'      => 'Veuillez rendre le répertoire suivant accessible en écriture :',
	'ERR_DB_VERSION_FAILURE'			=> 'Impossible de vérifier la version de la base de données.',
	'DEFAULT_CHARSET'					=> 'UTF-8',
	'ERR_ADMIN_USER_NAME_BLANK'         => 'Saisissez le nom d\'utilisateur de l\'administrateur de SuiteCRM.',
	'ERR_ADMIN_PASS_BLANK'				=> 'Saisissez le mode de passe de l\'administrateur de SuiteCRM.',

	'ERR_CHECKSYS'                      => 'Des erreurs ont été détectées pendant le test de compatibilité. Veuillez mettre en place les mesures correctives nécessaires au bon fonctionnement de SuiteCRM avant de relancer le test de compatibilité ou une nouvelle installation.',
	'ERR_CHECKSYS_CALL_TIME'            => 'Call Time Pass Reference est activé ( il devrait etre desactivé dans le fichier php.ini )',
	'ERR_CHECKSYS_CURL'					=> 'Non trouvé : le planificateur de SuiteCRM fonctionnera de manière limitée.',
	'ERR_CHECKSYS_IMAP'					=> 'Non trouvé : Les fonctions de campagnes mail et gestion des mails entrant nécessitent la présence des librairies IMAP. Ces fonctions ne sont donc pas activées.',
	'ERR_CHECKSYS_MSSQL_MQGPC'			=> 'La fonction "Magic Quotes GPC" ne peut être activée pendant l\'utilisation du serveur MS SQL.',
	'ERR_CHECKSYS_MEM_LIMIT_0'			=> 'Avertissement :',
	'ERR_CHECKSYS_MEM_LIMIT_1'			=> '(Veuillez régler ceci sur',
	'ERR_CHECKSYS_MEM_LIMIT_2'			=> 'M ou plus dans votre fichier php.ini)',
	'ERR_CHECKSYS_MYSQL_VERSION'		=> 'Version minimum requise - 4.1.2 - version trouvée :',
	'ERR_CHECKSYS_NO_SESSIONS'			=> 'Echec des variables de session en lecture et écriture. L\'installation ne peut continuer.',
	'ERR_CHECKSYS_NOT_VALID_DIR'		=> 'Le répertoire n\'est pas valide',
	'ERR_CHECKSYS_NOT_WRITABLE'			=> 'Avertissement : écriture impossible',
	'ERR_CHECKSYS_PHP_INVALID_VER'		=> 'Votre version de PHP n&#39; est pas supportée par SuiteCRM. Vous devez installer une version de PHP compatible avec SuiteCRM. Merci de consulter la matrice de compatibilité disponible dans le document "Release Notes" pour voir quelle versions de PHP sont supportées par SuiteCRM. Votre version actuelle est',
	'ERR_CHECKSYS_IIS_INVALID_VER'      => 'Votre version d\'IIS est pas supportée par SuiteCRM. Vous devez installer une version de PHP compatible avec SuiteCRM. Merci de consulter la matrice de compatibilité disponible dans le document "Release Notes" pour voir quelle versions de PHP sont supportées par SuiteCRM. Votre version actuelle est',
	'ERR_CHECKSYS_FASTCGI'              => 'Nous détectons que vous n\'utilisez pas FastCGI pour PHP. Vous devez installer une version de PHP compatible avec SuiteCRM. Merci de consulter la matrice de compatibilté disponible dans le document "Release Notes" pour voir quelle versions de PHP sont supportées par SuiteCRM. Retrouvez tous les détails sur<a href="http://www.iis.net/php/" target="_blank">http://www.iis.net/php/</a>',
	'ERR_CHECKSYS_FASTCGI_LOGGING'      => 'Pour une utilisation optimale de IIS/FastCGI, positionnez le paramètre fastcgi.logging à 0 dans votre fichier php.ini.',
	'ERR_CHECKSYS_PHP_UNSUPPORTED'		=> 'Votre version de PHP n\'est pas supportée : (ver',
	'LBL_DB_UNAVAILABLE'                => 'Base de donnée non disponible',
	'LBL_CHECKSYS_DB_SUPPORT_NOT_AVAILABLE' => 'Nous ne trouvons pas de support de base de données. Veuillez vérifier que vous disposez bien des pilotes nécessaires pour l\'un des types de bases de données suivant : MySQL ou MS SQL Server. Vous pouvez avoir besoin de dé-commenter l\'extension dans votre fichier php.ini ou de recompiler avec les bons binaires, selon votre version de PHP. Veuillez vous référer au manuel de PHP pour savoir comment activer le support pour bases de données.',
	'LBL_CHECKSYS_XML_NOT_AVAILABLE'        => 'Nous ne trouvons pas de support pour les fonctions associées aux librairies XML Parser requises pour SuiteCRM. Vous pouvez avoir besoin de dé-commenter l\'extension dans votre fichier php.ini ou de recompiler avec les bons binaires, selon votre version de PHP. Veuillez vous référer au manuel de PHP pour savoir comment activer le support pour bases de données.',
	'ERR_CHECKSYS_MBSTRING'             => 'Les fonctions associées à l\'extension PHP chaînes de caractère multi-octets (mbstring) qui sont nécessaires à l\'application SuiteCRM n\'ont pas été trouvées. <br/> <br/> Généralement, le module mbstring n\'est pas activé par défaut dans PHP et doit être activé avec l\'option--enable-mbstring lorsque le binaire PHP est généré. Veuillez vous référer au manuel PHP pour plus d\'informations sur la façon d\'activer le support de mbstring.',
	'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_SET'       => 'Le paramètre session.save_path dans votre fichier de configuration php (php.ini) n\'est pas défini ou est pointe sur un dossier qui n\'existe pas. Vous devez modifier le paramètre save_path dans php.ini ou vérifiez que les dossier définis dans save_path existent bien.',
	'ERR_CHECKSYS_SESSION_SAVE_PATH_NOT_WRITABLE'  => 'The session.save_path setting in your php configuration file (php.ini) is set to a folder which is not writeable. Please take the necessary steps to make the folder writeable. <br>Depending on your Operating system, this might require you to change the permissions by running chmod 766, or to right click on the filename to access the properties and uncheck the read only option.',
	'ERR_CHECKSYS_CONFIG_NOT_WRITABLE'  => 'The config file exists but is not writeable. Please take the necessary steps to make the file writeable. Depending on your Operating system, this might require you to change the permissions by running chmod 766, or to right click on the filename to access the properties and uncheck the read only option.',
	'ERR_CHECKSYS_CONFIG_OVERRIDE_NOT_WRITABLE'  => 'Le fichier de substitution de configuration existe mais n\'est pas accessible en écriture.  Veuillez faire le nécessaire pour rendre le fichier accessible en écriture.  Selon votre système d\'exploitation, vous devez modifier les permissions en exécutant un chmod 766 sur le fichier, ou faire un clic droit sur le nom de fichier pour accéder aux propriétés et décochez l\'option lecture seule.',
	'ERR_CHECKSYS_CUSTOM_NOT_WRITABLE'  => 'Le répertoire personnalisé existe mais n\'est pas accessible en écriture.  Vous devrez peut-être modifier les autorisations sur (chmod 766) ou faites un clic droit dessus et décocher l\'option lecture seule, selon votre système d\'exploitation.  Veuillez prendre les mesures nécessaires pour rendre le fichier accessible en écriture.',
	'ERR_CHECKSYS_FILES_NOT_WRITABLE'   => "Les fichiers ou les répertoires listés ci-dessous ne sont pas accessible en écriture, sont manquants ou ne peuvent pas être créés.  Selon votre système d'exploitation, corriger ceci peut vous obliger à modifier les autorisations sur les fichiers ou le répertoire parent (chmod 755), ou de faire un clic droit sur le répertoire parent et décochez l'option « lecture seule » et l'appliquer à tous les sous-dossiers.",
	'LBL_CHECKSYS_OVERRIDE_CONFIG' => 'Remplacer la configuration',
	'ERR_CHECKSYS_SAFE_MODE'			=> 'Le Safe Mode est activé (vous pouvez le désactiver dans le fichier php.ini)',
	'ERR_CHECKSYS_ZLIB'					=> 'Le support ZLib introuvable : SuiteCRM tire des avantages de performances énormes avec la compression ZLib.',
	'ERR_CHECKSYS_ZIP'					=> 'Le support ZIP n\'a pas été trouvé : SuiteCRM a besoin du support ZIP pour traiter les fichiers compressés.',
	'ERR_CHECKSYS_PCRE'					=> 'Version de la bibliothèque PCRE introuvable : SuiteCRM nécessite la bibliothèque PCRE pour gérer les expressions régulières de style Perl.',
	'ERR_CHECKSYS_PCRE_VER'				=> 'Version de la bibliothèque PCRE : SuiteCRM nécessite la bibliothèque PCRE 7.0 ou ultérieur pour gérer les expressions régulières de style Perl.',
	'ERR_DB_ADMIN'						=> 'Les informations de connexion a la base de données utilisateur et/ou mot de passe sont erronées, la connexion n\'a pas pu s\'effectuer. Merci de renseigner un utilisateur et un mot de passe valides.  (Error: ',
	'ERR_DB_ADMIN_MSSQL'                => 'Les informations de connexion a la base de données utilisateur et/ou mot de passe sont erronées, la connexion n\'a pas pu s\'effectuer. Merci de renseigner un utilisateur et un mot de passe valides.',
	'ERR_DB_EXISTS_NOT'					=> 'La base de données spécifiée n\'existe pas.',
	'ERR_DB_EXISTS_WITH_CONFIG'			=> 'La base de données existe déjà avec ces données de configuration. Pour exécuter une installation avec la base de données choisie,  ré-exécuter l\'installation et choisissez : \\"Supprimer les tables existantes et les recréer.\\" dans l\'Assistant de mise à niveau depuis la console d\'administration. Veuillez consulter la documentation de mise à niveau  <a href=\\"http://www.suitecrm.com target=\\"_new\\">ici</a>.',
	'ERR_DB_EXISTS'						=> 'Une base de donnée existe déjà sous le nom fourni. Nous ne pouvons créer une nouvelle base sous le même nom.',
	'ERR_DB_EXISTS_PROCEED'             => 'Le Nom de base de données fourni existe déjà. Vous pouvez <br> 1. cliquez sur le bouton retour et choisir un nouveau nom de base de données <br> 2. Cliquez sur Suivant pour continuer, mais toutes les tables existantes sur cette base de données seront supprimées. <strong> Vos tables et les données seront detruites. </ strong>',
	'ERR_DB_HOSTNAME'					=> 'Le nom d\'hôte ne peut être vide.',
	'ERR_DB_INVALID'					=> 'Le type de base de données sélectionné est invalide.',
	'ERR_DB_LOGIN_FAILURE'				=> 'Les informations de connexion a la base de données utilisateur et/ou mot de passe sont erronées, la connexion n\'a pas pu s\'effectuer. Merci de renseigner un utilisateur et un mot de passe valides.',
	'ERR_DB_LOGIN_FAILURE_MYSQL'		=> 'Les informations de connexion a la base de données utilisateur et/ou mot de passe sont erronées, la connexion n\'a pas pu s\'effectuer. Merci de renseigner un utilisateur et un mot de passe valides.',
	'ERR_DB_LOGIN_FAILURE_MSSQL'		=> 'Les informations de connexion a la base de données utilisateur et/ou mot de passe sont erronées, la connexion n\'a pas pu s\'effectuer. Merci de renseigner un utilisateur et un mot de passe valides.',
	'ERR_DB_MYSQL_VERSION'				=> 'Votre version de MySQL (%s) n\'est pas compatible avec SuiteCRM. Vous devez installer une version compatible.Veuillez consulter la grille de compatibilité dans les releases notes afin de déterminer les versions supportées.',
	'ERR_DB_NAME'						=> 'Le nom de la base de donnée ne peut être vide.',
	'ERR_DB_NAME2'						=> "Le nom de la base de donnée ne peut contenir les caractères '\\', '/', ou '.'",
	'ERR_DB_MYSQL_DB_NAME_INVALID'      => "Le nom de la base de donnée ne peut contenir les caractères '\\', '/', ou '.'",
	'ERR_DB_MSSQL_DB_NAME_INVALID'      => "Le nom de la base de donnée ne peut commencer par un nombre, un '#' ou un '@' et ne peut contenir, un espace, les caractères '\"', \"'\", '*', '/', '\\', '?', ':', '<', '>', '&', '!', ou '-'",
	'ERR_DB_OCI8_DB_NAME_INVALID'       => "Le nom de la base de donnée ne peut être composé que de caractères alphanumériques et des symboles  '#', '_' ou '$'",
	'ERR_DB_PASSWORD'					=> 'Le mot de passe fourni pour l\'administrateur de la base de données SuiteCRM ne correspond pas. Veuillez re-saisir le mot de passe dans le formulaire.',
	'ERR_DB_PRIV_USER'					=> 'Merci de renseigner un utilisateur de base de données.Cet utilisateur est nécéssaire pour la connexion à la base de données.',
	'ERR_DB_USER_EXISTS'				=> 'Ce nom d\'utilisateur est déja présent dans la base SuiteCRM -- Impossible de créer deux utilisateur identiques-- Merci de saisir un nouveau nom d\'utilisateur',
	'ERR_DB_USER'						=> 'Entrez un nom pour l\'administrateur de la base de données SuiteCRM.',
	'ERR_DBCONF_VALIDATION'				=> 'Veuillez corriger les erreurs suivantes avant de continuer :',
	'ERR_DBCONF_PASSWORD_MISMATCH'      => 'Les mots de passe fournis pour l\'utilisateur de base de données SuiteCRM ne correspondent pas. S\' il vous plaît,entrer de nouveau les mêmes mots de passe dans les champs de mot de passe .',
	'ERR_ERROR_GENERAL'					=> 'Les erreurs suivantes ont été rencontrées :',
	'ERR_LANG_CANNOT_DELETE_FILE'		=> 'Impossible de supprimer ce fichier :',
	'ERR_LANG_MISSING_FILE'				=> 'Fichier introuvable :',
	'ERR_LANG_NO_LANG_FILE'			 	=> 'Aucun fichier de langue trouvé dans "include/language" :',
	'ERR_LANG_UPLOAD_1'					=> 'Une erreur s\'est produite pendant le téléchargement. Veuillez ré-essayer.',
	'ERR_LANG_UPLOAD_2'					=> 'Les packs de langue doivent être des fichiers ZIP.',
	'ERR_LANG_UPLOAD_3'					=> 'PHP ne peut pas déplacer le répertoire temporaire vers le répertoire de mise à jour.',
	'ERR_LICENSE_MISSING'				=> 'Des champs nécessaires sont manquants',
	'ERR_LICENSE_NOT_FOUND'				=> 'Fichier de licence introuvable !',
	'ERR_LOG_DIRECTORY_NOT_EXISTS'		=> 'Le répertoire de log indiqué n\'est pas valide.',
	'ERR_LOG_DIRECTORY_NOT_WRITABLE'	=> 'Le répertoire de log indiqué n\'est pas accessible en écriture.',
	'ERR_LOG_DIRECTORY_REQUIRED'		=> 'Le répertoire de log est requis si vous souhaité spécifié votre propre répertoire.',
	'ERR_NO_DIRECT_SCRIPT'				=> 'Le script n\'a pu être exécuté.',
	'ERR_NO_SINGLE_QUOTE'				=> 'Impossible d&#39;utiliser le simple guillemet pour',
	'ERR_PASSWORD_MISMATCH'				=> 'Les mots de passe fournis pour l\'admin SuiteCRM ne correspondent pas. S\'il vous plaît entrer de nouveau les mêmes mots de passe dans les champs de mot de passe .',
	'ERR_PERFORM_CONFIG_PHP_1'			=> 'Impossible d\'écrire dans le fichier <span class=stop>config.php</span> ',
	'ERR_PERFORM_CONFIG_PHP_2'			=> 'Vous pouvez continuer cette installation en créant manuellement un fichier config.php et en y collant les informations ci-dessous. Cependant, vous <strong>devez</strong> créer le fichier config.php avant de continuer vers l\'étape suivante.',
	'ERR_PERFORM_CONFIG_PHP_3'			=> 'Avez vous bien créé le fichier config.php ?',
	'ERR_PERFORM_CONFIG_PHP_4'			=> 'Attention : Impossible d\'écrire dans le fichier config.php. Veuillez vérifier qu\'il existe.',
	'ERR_PERFORM_HTACCESS_1'			=> 'Impossible d\'écrire dans le',
	'ERR_PERFORM_HTACCESS_2'			=> 'fichier.',
	'ERR_PERFORM_HTACCESS_3'			=> 'Si vous voulez empêcher les fichiers de log d\'être accessibles par un navigateur, veuillez créer un fichier .htaccess dans le répertoire des logs avec la ligne suivante :',
	'ERR_PERFORM_NO_TCPIP'				=> '<b> Nous ne pouvions pas détecter une connexion Internet. </b> Lorsque vous avez une connexion , rendez-vous sur <a href="http://www.suitecrm.com/"> http://www.suitecrm.com / </a> pour vous enregistrer auprès SuiteCRM . En nous faisant connaitre un peu plus sur la façon dont votre société prévoit d\'utiliser SuiteCRM , nous pourrons vous assurer que nous fournirons la bonne application pour vos besoins professionnels.',
	'ERR_SESSION_DIRECTORY_NOT_EXISTS'	=> 'Le répertoire de sessions n\'est pas un dossier valide.',
	'ERR_SESSION_DIRECTORY'				=> 'Le répertoire de sessions n\'est pas accessible en écriture.',
	'ERR_SESSION_PATH'					=> 'Le chemin de sessions est requis si vous souhaitez spécifier votre propre répértoire.',
	'ERR_SI_NO_CONFIG'					=> 'Vous n\'avez pas inclus config_si.php dans la racine du dossier, ou vous n\'avez pas défini $sugar_config dans le fichier config.php.',
	'ERR_SITE_GUID'						=> 'Un ID d\'application est requis si vous souhaitez spécifier votre propre application.',
	'ERROR_SPRITE_SUPPORT'              => "Nous ne sommes pas en mesure de localiser la bibliothèque GD, par conséquent, vous ne serez pas en mesure d'utiliser la fonctionnalité CSS Sprite.",
	'ERR_UPLOAD_MAX_FILESIZE'			=> 'Avertissement: Votre configuration de PHP doit être modifié pour permettre l\'upload de fichiers d\'au moins 6 Mo.',
	'LBL_UPLOAD_MAX_FILESIZE_TITLE'     => 'Taille max des fichiers autorisée en upload',
	'ERR_URL_BLANK'						=> 'Indiquer l\'adresse URL de base pour l\'installation SuiteCRM',
	'ERR_UW_NO_UPDATE_RECORD'			=> 'Impossible de localiser le fichier d&#39;installation de',
	'ERROR_FLAVOR_INCOMPATIBLE'			=> 'Le fichier téléchargé n’est pas compatible avec cette version de SuiteCRM : ',
	'ERROR_LICENSE_EXPIRED'				=> "ERREUR: Votre licence a expiré il y a",
	'ERROR_LICENSE_EXPIRED2'			=> "jour(s) restant. Rendez vous sur <a href='index.php?action=LicenseSettings&module=Administration'> \"Gestion des licences\" </a> dans l'écran d'administration pour entrer votre nouvelle clé de licence. Si vous n'entrez pas une nouvelle clé de licence dans les 30 jours après expiration de la clé, vous ne serez plus en mesure de se connecter à cette application.",
	'ERROR_MANIFEST_TYPE'				=> 'Le fichier Manifest doit spécifier le type du package.',
	'ERROR_PACKAGE_TYPE'				=> 'Le fichier Manifest spécifie un type de package inconnu',
	'ERROR_VALIDATION_EXPIRED'			=> "ERREUR: Votre clé de validation a expiré",
	'ERROR_VALIDATION_EXPIRED2'			=> "jour(s) restant. Rendez vous sur <a href='index.php?action=LicenseSettings&module=Administration'> '</a> \"Gestion des licences\" dans l'écran d'administration pour entrer votre nouvelle clé de validation. Si vous n'entrez pas une nouvelle clé de validation dans les 30 jours suivant l'expiration de votre clé, vous ne serez plus en mesure de se connecter à cette application.",
	'ERROR_VERSION_INCOMPATIBLE'		=> 'Le fichier uploadé n&#39; est pas compatible avec cette version de SuiteCRM :',

	'LBL_BACK'							=> 'Précédent',
	'LBL_CANCEL'                        => 'Annuler/Fermer',
	'LBL_ACCEPT'                        => 'J\'accepte',
	'LBL_CHECKSYS_1'					=> 'Pour que votre installation de SuiteCRM fonctionne correctement, veuillez vous assurer que tous les contrôles du système énumérés ci-dessous sont verts. Si des éléments sont en rouge, prenez les mesures nécessaires pour les corriger. <BR> Pour obtenir de l\'aide sur ces vérifications du système, rendez-vous sur <a href = "http://www.suitecrm.com" target = "_ blank" > SuiteCRM </a>.',
	'LBL_CHECKSYS_CACHE'				=> 'Dossier Cache accessible en écriture',
	'LBL_DROP_DB_CONFIRM'               => 'La base de données spécifiée existe déjà <br> Vous pouvez soit:. <br> 1. Cliquez sur le bouton Annuler et choisir une autre base de données, ou <br> 2. Cliquez sur le bouton Accepter et continuer. Toutes les tables existantes dans la base de données seront supprimées. <strong> Cela signifie que toutes les tables et les données préexistantes seront détruites. </ strong>
',
	'LBL_CHECKSYS_CALL_TIME'			=> 'PHP Allow Call Time Pass Reference est déactivé',
	'LBL_CHECKSYS_COMPONENT'			=> 'Composant',
	'LBL_CHECKSYS_COMPONENT_OPTIONAL'	=> 'Composants optionnels',
	'LBL_CHECKSYS_CONFIG'				=> 'Fichier de configuration SuiteCrm (config.php) accessible en écriture ',
	'LBL_CHECKSYS_CONFIG_OVERRIDE'		=> 'Fichier de configuration SuiteCrm (config_override.php) accessible en ecriture ',
	'LBL_CHECKSYS_CURL'					=> 'Module cURL',
	'LBL_CHECKSYS_SESSION_SAVE_PATH'    => 'Chemin de sauvegarde des sessions',
	'LBL_CHECKSYS_CUSTOM'				=> 'Dossier Custom accessible en écriture',
	'LBL_CHECKSYS_DATA'					=> 'Dossier Data accessible en écriture',
	'LBL_CHECKSYS_IMAP'					=> 'Module IMAP',
	'LBL_CHECKSYS_FASTCGI'             => 'FastCGI',
	'LBL_CHECKSYS_MQGPC'				=> 'MagicQuotes GPC',
	'LBL_CHECKSYS_MBSTRING'				=> 'Module MB Strings',
	'LBL_CHECKSYS_MEM_OK'				=> 'OK (pas de limites)',
	'LBL_CHECKSYS_MEM_UNLIMITED'		=> 'OK (illimité)',
	'LBL_CHECKSYS_MEM'					=> 'Limite de la mémoire PHP',
	'LBL_CHECKSYS_MODULE'				=> 'Dossier Modules et Files accessible en écriture',
	'LBL_CHECKSYS_MYSQL_VERSION'		=> 'Version de MySQL',
	'LBL_CHECKSYS_NOT_AVAILABLE'		=> 'Non Disponible',
	'LBL_CHECKSYS_OK'					=> 'Ok',
	'LBL_CHECKSYS_PHP_INI'				=> 'Emplacement de votre fichier de configuration PHP (php.ini).',
	'LBL_CHECKSYS_PHP_OK'				=> 'Ok (ver',
	'LBL_CHECKSYS_PHPVER'				=> 'Version de PHP',
	'LBL_CHECKSYS_IISVER'               => 'Version d\'IIS',
	'LBL_CHECKSYS_RECHECK'				=> 'Re-vérifier',
	'LBL_CHECKSYS_SAFE_MODE'			=> 'Mode PHP Safe désactivé',
	'LBL_CHECKSYS_SESSION'				=> 'Dossier Session accessible en écriture (',
	'LBL_CHECKSYS_STATUS'				=> 'Statut',
	'LBL_CHECKSYS_TITLE'				=> 'Vérification système acceptation',
	'LBL_CHECKSYS_VER'					=> 'Trouvé : (ver',
	'LBL_CHECKSYS_XML'					=> 'Parseur XML',
	'LBL_CHECKSYS_ZLIB'					=> 'Module de compression ZLib',
	'LBL_CHECKSYS_ZIP'					=> 'Module de manipulation ZIP',
	'LBL_CHECKSYS_PCRE'					=> 'Librairie PCRE',
	'LBL_CHECKSYS_FIX_FILES'            => 'Veuillez réparer les répertoires ou fichiers suivants avant de continuer :',
	'LBL_CHECKSYS_FIX_MODULE_FILES'     => 'Veuillez réparer les répertoires de modules ou les fichiers suivants avant de continuer :',
	'LBL_CHECKSYS_UPLOAD'               => 'Dossier Upload accessible en écriture',
	'LBL_CLOSE'							=> 'Fermer',
	'LBL_THREE'                         => '3',
	'LBL_CONFIRM_BE_CREATED'			=> 'est créé',
	'LBL_CONFIRM_DB_TYPE'				=> 'Type de base de données',
	'LBL_CONFIRM_DIRECTIONS'			=> 'Veuillez confirmer les réglages ci-dessous. Clickez sur "Précédent" pour éditer les valeurs que vous souhaiteriez modifier. Autrement, cliquez sur "Suivant" pour commencer l\'installation.',
	'LBL_CONFIRM_LICENSE_TITLE'			=> 'informations de licence',
	'LBL_CONFIRM_NOT'					=> 'pas',
	'LBL_CONFIRM_TITLE'					=> 'Vérifier',
	'LBL_CONFIRM_WILL'					=> 'veut',
	'LBL_DBCONF_CREATE_DB'				=> 'Créer base de données',
	'LBL_DBCONF_CREATE_USER'			=> 'Créer Utilisateur [Alt+N]',
	'LBL_DBCONF_DB_DROP_CREATE_WARN'	=> 'Attention : Toutes les données de SuiteCRM seront effacées <br> si cette case est cochée.',
	'LBL_DBCONF_DB_DROP_CREATE'			=> 'Effacer et re-créer les tables SuiteCRM existantes ?',
	'LBL_DBCONF_DB_DROP'                => 'Effacer les tables',
	'LBL_DBCONF_DB_NAME'				=> 'Nom de la base de données',
	'LBL_DBCONF_DB_PASSWORD'			=> 'Mot de passe utilisateur de la base de données SuiteCRM',
	'LBL_DBCONF_DB_PASSWORD2'			=> 'Re-saisir le mot de passe de l\'utilisateur de la base de données SuiteCRM',
	'LBL_DBCONF_DB_USER'				=> 'Utilisateur de la base de données SuiteCRM',
	'LBL_DBCONF_SUGAR_DB_USER'          => 'Utilisateur de la base de données SuiteCRM',
	'LBL_DBCONF_DB_ADMIN_USER'          => 'Nom de l\'administrateur de la base de données SuiteCRM',
	'LBL_DBCONF_DB_ADMIN_PASSWORD'      => 'Mot de passe de l\'administrateur de la base de données SuiteCRM',
	'LBL_DBCONF_DEMO_DATA'				=> 'Intégrer des données de démonstration dans la base de données ?',
	'LBL_DBCONF_DEMO_DATA_TITLE'        => 'Choisir les données de démonstration',
	'LBL_DBCONF_HOST_NAME'				=> 'Nom d\'hôte',
	'LBL_DBCONF_HOST_INSTANCE'			=> 'Hôte Instance',
	'LBL_DBCONF_HOST_PORT'				=> 'Port',
	'LBL_DBCONF_INSTRUCTIONS'			=> 'Veuillez entrez les information de configuration de votre base de données ci-dessous. Si vous n\'êtes pas sûr de ces informations, nous vous suggérons d\'utiliser les valeurs par défaut.',
	'LBL_DBCONF_MB_DEMO_DATA'			=> 'Utiliser le text multi-byte pour les données de démonstration ?',
	'LBL_DBCONFIG_MSG2'                 => 'Nom du serveur web ou de la machine (hôte) sur lequel la base de données est située (localhost ou www.mydomain.com):',
	'LBL_DBCONFIG_MSG2_LABEL' => 'Nom d\'hôte',
	'LBL_DBCONFIG_MSG3'                 => 'Nom de la base de données qui contiendra les données de l\'instance SuiteCRM que vous vous apprêtez à installer:',
	'LBL_DBCONFIG_MSG3_LABEL' => 'Nom de la base de données',
	'LBL_DBCONFIG_B_MSG1'               => 'Le nom d\'utilisateur et mot de passe d\'un administrateur de base de données qui peut créer des tables , des bases de données et des utilisateurs et qui écrire dans la base de données est nécessaire pour mettre en place SuiteCRM.',
	'LBL_DBCONFIG_B_MSG1_LABEL' => '',
	'LBL_DBCONFIG_SECURITY'             => 'Pour des raisons de sécurité, vous pouvez spécifier un utilisateur de base de données exclusif  à la base de données SuiteCRM. Cet utilisateur doit être capable d\'écrire, mettre à jour et extraire des données sur la base de données SuiteCRM qui sera créé pour cette instance. Cet utilisateur peut être l\'administrateur de base de données spécifié ci-dessus, ou vous pouvez fournir des informations de l\'utilisateur de la base de données nouvelle ou existante.',
	'LBL_DBCONFIG_AUTO_DD'              => 'Fait le pour moi',
	'LBL_DBCONFIG_PROVIDE_DD'           => 'Insérer un utilisateur existant',
	'LBL_DBCONFIG_CREATE_DD'            => 'Définir les utilisateurs à créer',
	'LBL_DBCONFIG_SAME_DD'              => 'Similaire à l\'administrateur',
	//'LBL_DBCONF_I18NFIX'              => 'Apply database column expansion for varchar and char types (up to 255) for multi-byte data?',
	'LBL_FTS'                           => 'Recherche en plein texte (Full Text)',
	'LBL_FTS_INSTALLED'                 => 'installé',
	'LBL_FTS_INSTALLED_ERR1'            => 'La recherche plein texte (Full Text) n\'est pas installée',
	'LBL_FTS_INSTALLED_ERR2'            => 'Vous pouvez toujours continuer l\' installation, mais vous ne serez pas en mesure d\'utiliser la fonctionnalité de Recherche en texte intégral. Veuillez vous référer au guide d\'installation de votre serveur de base de données, ou contactez votre administrateur.',
	'LBL_DBCONF_PRIV_PASS'				=> 'Mot de passe de l\'utilisateur privilégié de la base de données',
	'LBL_DBCONF_PRIV_USER_2'			=> 'Le compte utilisateur de la base de données ci-dessous est un utilisateur privilégié ?',
	'LBL_DBCONF_PRIV_USER_DIRECTIONS'	=> 'Cet utilisateur privilégié de base de données doit avoir les autorisations appropriées pour créer une base de données, déposer / créer des tables, et créer un utilisateur. Cet utilisateur privilégié de base de données ne sera utilisée que pour effectuer ces tâches au besoin pendant le processus d\'installation. Vous pouvez également utiliser le même utilisateur de base de données ci-dessus si l\'utilisateur a des privilèges suffisants.',
	'LBL_DBCONF_PRIV_USER'				=> 'Utilisateur privilégié de la base de données',
	'LBL_DBCONF_TITLE'					=> 'Configuration de la base de données',
	'LBL_DBCONF_TITLE_NAME'             => 'Entrez un nom pour la base de données',
	'LBL_DBCONF_TITLE_USER_INFO'        => 'Entrez les informations utilisateur pour la base de données',
	'LBL_DBCONF_TITLE_USER_INFO_LABEL' => 'Utilisateur',
	'LBL_DBCONF_TITLE_PSWD_INFO_LABEL' => 'Mot de passe',
	'LBL_DISABLED_DESCRIPTION_2'		=> 'Après que cette modification ai été appliquée, vous pouvez cliquer sur le bouton "Démarrer" ci-dessous pour commencer votre installation. <i> Une fois l\'installation terminée, vous devrez changer la valeur pour \'installer_locked\' à \'true\'. </ i>',
	'LBL_DISABLED_DESCRIPTION'			=> 'Le programme d\'installation a déjà été exécuté une fois. Par mesure de sécurité, il a été désactivée pour une nouvelle execution. Si vous êtes absolument sûr que vous voulez l\'exécuter à nouveau, veuillez modifier votre fichier config.php et localiser (ou ajouter) une variable appelée «installer_locked» avec la valeur «false». La ligne devrait ressembler à ceci:',
	'LBL_DISABLED_HELP_1'				=> 'Pour de l\'assistance à l\'installation, veuillez visiter le site SuiteCRM',
	'LBL_DISABLED_HELP_LNK'             => 'http://www.suitecrm.com/forum/index',
	'LBL_DISABLED_HELP_2'				=> 'Forums d\'assistance',
	'LBL_DISABLED_TITLE_2'				=> 'L\'installation de SuiteCRM a été désactivée',
	'LBL_DISABLED_TITLE'				=> 'Installation de SuiteCRM désactivée',
	'LBL_EMAIL_CHARSET_DESC'			=> 'Jeu de caractères couramment utilisé dans votre région',
	'LBL_EMAIL_CHARSET_TITLE'			=> 'paramètres emails sortants',
	'LBL_EMAIL_CHARSET_CONF'            => 'Jeu de caractères pour les emails sortants',
	'LBL_HELP'							=> 'Aide',
	'LBL_INSTALL'                       => 'Installation',
	'LBL_INSTALL_TYPE_TITLE'            => 'Options d\'installation',
	'LBL_INSTALL_TYPE_SUBTITLE'         => 'Choisir un type d\'installation',
	'LBL_INSTALL_TYPE_TYPICAL'          => '<b>Installation standard</b>',
	'LBL_INSTALL_TYPE_CUSTOM'           => '<b>Installation personnalisée</b>',
	'LBL_INSTALL_TYPE_MSG1'             => 'La clé est nécessaire pour utiliser l\'application, mais elle n\'est pas nécessaire pour l\'installation. Vous n\'avez pas besoin d\'entrer la clé à ce moment, mais vous devrez fournir la clé après avoir installé l\'application.',
	'LBL_INSTALL_TYPE_MSG2'             => 'Nécessite un minimum d\'informations pour l\'installation. Recommandé pour les nouveaux utilisateurs.',
	'LBL_INSTALL_TYPE_MSG3'             => 'Fournit des options supplémentaires lors de l\'installation. La plupart de ces options sont également disponibles après l\'installation dans les écrans d\'administration. Recommandé pour les utilisateurs avancés.',
	'LBL_LANG_1'						=> 'Pour utiliser une langue dans SuiteCRM autre que la langue par défaut (anglais américain), vous pouvez télécharger et installer le pack de langue maintenant. Vous serez aussi en mesure de télécharger et installer des modules linguistiques dans SuiteCRM ultérieurement. Si vous souhaitez sauter cette étape, cliquez sur Suivant.',
	'LBL_LANG_BUTTON_COMMIT'			=> 'Installation',
	'LBL_LANG_BUTTON_REMOVE'			=> 'Supprimer',
	'LBL_LANG_BUTTON_UNINSTALL'			=> 'Désinstaller',
	'LBL_LANG_BUTTON_UPLOAD'			=> 'Uploader',
	'LBL_LANG_NO_PACKS'					=> 'aucun',
	'LBL_LANG_PACK_INSTALLED'			=> 'Les packs de langue suivants ont été installés :',
	'LBL_LANG_PACK_READY'				=> 'Les packs de langues suivants sont prêts à être installés :',
	'LBL_LANG_SUCCESS'					=> 'Le pack de langue a été téléchargé avec succès.',
	'LBL_LANG_TITLE'			   		=> 'Pack de langue',
	'LBL_LAUNCHING_SILENT_INSTALL'     => 'Installer SuiteCRM maintenant. L\'installation peut prendre quelques minutes.',
	'LBL_LANG_UPLOAD'					=> 'Charger un pack de langue',
	'LBL_LICENSE_ACCEPTANCE'			=> 'Acceptation de licence',
	'LBL_LICENSE_CHECKING'              => 'Vérification de compatibilité du système.',
	'LBL_LICENSE_CHKENV_HEADER'         => 'Vérification de l\'environnement.',
	'LBL_LICENSE_CHKDB_HEADER'          => 'Vérification des autorisations de la base de données.',
	'LBL_LICENSE_CHECK_PASSED'          => 'Tests de compatibilité du systeme',
	'LBL_CREATE_CACHE' => 'Préparation de l\'installation...',
	'LBL_LICENSE_REDIRECT'              => 'Redirection vers',
	'LBL_LICENSE_DIRECTIONS'			=> 'Si vous avez vos informations de licence, veuillez les entrer dans les champs ci-dessous.',
	'LBL_LICENSE_DOWNLOAD_KEY'			=> 'Entre votre clé de téléchargement',
	'LBL_LICENSE_EXPIRY'				=> 'Date d\'expiration',
	'LBL_LICENSE_I_ACCEPT'				=> 'J\'accepte',
	'LBL_LICENSE_NUM_USERS'				=> 'Nombre d&#39;utilisateurs',
	'LBL_LICENSE_OC_DIRECTIONS'			=> 'Veuillez entrez le nombre de clients hors ligne achetés.',
	'LBL_LICENSE_OC_NUM'				=> 'Nombre de licence pour les clients Offline',
	'LBL_LICENSE_OC'					=> 'Licenses clients hors lignes',
	'LBL_LICENSE_PRINTABLE'				=> 'Version imprimable',
	'LBL_PRINT_SUMM'                    => 'Sommaire de l\'impression',
	'LBL_LICENSE_TITLE_2'				=> 'Licence SuiteCRM',
	'LBL_LICENSE_TITLE'					=> 'Informations de licence',
	'LBL_LICENSE_USERS'					=> 'Licenses Utilisateurs',

	'LBL_LOCALE_CURRENCY'				=> 'Configuration des devises',
	'LBL_LOCALE_CURR_DEFAULT'			=> 'Devise par défaut',
	'LBL_LOCALE_CURR_SYMBOL'			=> 'Symbole de la devise',
	'LBL_LOCALE_CURR_ISO'				=> 'Code Devise (ISO 4217)',
	'LBL_LOCALE_CURR_1000S'				=> 'Séparateur de millier',
	'LBL_LOCALE_CURR_DECIMAL'			=> 'Séparateur décimal',
	'LBL_LOCALE_CURR_EXAMPLE'			=> 'Exemple',
	'LBL_LOCALE_CURR_SIG_DIGITS'		=> 'Chiffre après la virgule',
	'LBL_LOCALE_DATEF'					=> 'Format par défaut de la date',
	'LBL_LOCALE_DESC'					=> 'Les réglages locaux spécifiés seront appliqués globalement pour tous les utilisateurs de SuiteCRM.',
	'LBL_LOCALE_EXPORT'					=> 'Jeu de caractère d\'importation/exportation <br><i>(Email, .csv, vCard, PDF, import des données)</i>',
	'LBL_LOCALE_EXPORT_DELIMITER'		=> 'Délimiteur de l\'exportation (.csv)',
	'LBL_LOCALE_EXPORT_TITLE'			=> 'Paramètres d\'import / export',
	'LBL_LOCALE_LANG'					=> 'Langue par défaut',
	'LBL_LOCALE_NAMEF'					=> 'Format par défaut des noms',
	'LBL_LOCALE_NAMEF_DESC'				=> 's = salutation < br / > f = Prénom < br / > l = nom de famille',
	'LBL_LOCALE_NAME_FIRST'				=> 'Antoine',
	'LBL_LOCALE_NAME_LAST'				=> 'Dupont',
	'LBL_LOCALE_NAME_SALUTATION'		=> 'Dr.',
	'LBL_LOCALE_TIMEF'					=> 'Format par défaut de l\'heure',
	'LBL_CUSTOMIZE_LOCALE'              => 'Personnaliser les paramètres locaux',
	'LBL_LOCALE_UI'						=> 'Interface Utilisateur',

	'LBL_ML_ACTION'						=> 'Action',
	'LBL_ML_DESCRIPTION'				=> 'Description',
	'LBL_ML_INSTALLED'					=> 'Date d&#39;installation',
	'LBL_ML_NAME'						=> 'Nom',
	'LBL_ML_PUBLISHED'					=> 'Date de publication',
	'LBL_ML_TYPE'						=> 'Type',
	'LBL_ML_UNINSTALLABLE'				=> 'Désinstallable',
	'LBL_ML_VERSION'					=> 'Version',
	'LBL_MSSQL'							=> 'Serveur SQL',
	'LBL_MSSQL2'                        => 'SQL Server (FreeTDS)',
	'LBL_MSSQL_SQLSRV'				    => 'SQL Server (Microsoft SQL Server Driver pour PHP)',
	'LBL_MYSQL'							=> 'MySQL',
	'LBL_MYSQLI'						=> 'MySQL (extension mysqli)',
	'LBL_IBM_DB2'						=> 'IBM DB2',
	'LBL_NEXT'							=> 'Suivant',
	'LBL_NO'							=> 'Non',
	'LBL_ORACLE'						=> 'Oracle',
	'LBL_PERFORM_ADMIN_PASSWORD'		=> 'Mot de passe admin site',
	'LBL_PERFORM_AUDIT_TABLE'			=> 'table de vérification / ',
	'LBL_PERFORM_CONFIG_PHP'			=> 'Création du fichier de configuration SuiteCRM',
	'LBL_PERFORM_CREATE_DB_1'			=> '<b>Création de la base de données</b>',
	'LBL_PERFORM_CREATE_DB_2'			=> ' <b>sur</b> ',
	'LBL_PERFORM_CREATE_DB_USER'		=> 'Création de l\'utilisateur et du mot de passe de la base de données',
	'LBL_PERFORM_CREATE_DEFAULT'		=> 'Création des données par défaut de SuiteCRM',
	'LBL_PERFORM_CREATE_LOCALHOST'		=> 'Création de l\'utilisateur et du mot de passe de la base de données',
	'LBL_PERFORM_CREATE_RELATIONSHIPS'	=> 'Création des relations des tables SuiteCRM',
	'LBL_PERFORM_CREATING'				=> 'Création /',
	'LBL_PERFORM_DEFAULT_REPORTS'		=> 'Création des rapports par défaut',
	'LBL_PERFORM_DEFAULT_SCHEDULER'		=> 'Création des tâches planifiées par défaut',
	'LBL_PERFORM_DEFAULT_SETTINGS'		=> 'Validation des paramètres par défaut',
	'LBL_PERFORM_DEFAULT_USERS'			=> 'Création des utilisateurs par standard',
	'LBL_PERFORM_DEMO_DATA'				=> 'Peupler la base de données avec des données de démonstration (cela peut prendre quelques instants)',
	'LBL_PERFORM_DONE'					=> 'fait<br>',
	'LBL_PERFORM_DROPPING'				=> 'abandon / ',
	'LBL_PERFORM_FINISH'				=> 'Terminer',
	'LBL_PERFORM_LICENSE_SETTINGS'		=> 'Mise à jour des informations de licence',
	'LBL_PERFORM_OUTRO_1'				=> 'L\'installation de SuiteCRM',
	'LBL_PERFORM_OUTRO_2'				=> 'est maintenant terminée !',
	'LBL_PERFORM_OUTRO_3'				=> 'Temps total :',
	'LBL_PERFORM_OUTRO_4'				=> 'secondes.',
	'LBL_PERFORM_OUTRO_5'				=> 'Mémoire utilisée :',
	'LBL_PERFORM_OUTRO_6'				=> 'bits.',
	'LBL_PERFORM_OUTRO_7'				=> 'Votre système est maintenant installé et configuré.',
	'LBL_PERFORM_REL_META'				=> 'relation meta... ',
	'LBL_PERFORM_SUCCESS'				=> 'Succès !',
	'LBL_PERFORM_TABLES'				=> 'Création des tables application, audit et leurs métadonnées de relations',
	'LBL_PERFORM_TITLE'					=> 'Exécuter le programme d\'installation',
	'LBL_PRINT'							=> 'Imprimer',
	'LBL_REG_CONF_1'					=> 'Veuillez remplir le formulaire ci-dessous pour recevoir les annonces de produits, de nouvelles formation, offres spéciales et invitations à des événements spéciaux de SuiteCRM. Nous ne vendons pas, ni louons, ou partageons  les informations recueillies ici à des tiers.',
	'LBL_REG_CONF_2'					=> 'Votre nom et votre adresse email sont les seuls champs obligatoires pour l\'enregistrement. Tous les autres champs sont facultatifs, mais très utile. Nous ne vendons pas, ni louons, ou partageons  les informations recueillies ici à des tiers.',
	'LBL_REG_CONF_3'					=> 'Merci de votre inscription. Cliquez sur le bouton Terminer pour se connecter à SuiteCRM. Vous devez ouvrir une session pour la première fois en utilisant le nom d\'utilisateur « admin » et le mot de passe saisi à l\'étape 2.',
	'LBL_REG_TITLE'						=> 'Enregistrement',
	'LBL_REG_NO_THANKS'                 => 'Non merci',
	'LBL_REG_SKIP_THIS_STEP'            => 'Passer cette étape',
	'LBL_REQUIRED'						=> '* champs requis',

	'LBL_SITECFG_ADMIN_Name'            => 'SuiteCRM  Admin',
	'LBL_SITECFG_ADMIN_PASS_2'			=> 'Ré-entrer le mot de passe Admin SuiteCRM',
	'LBL_SITECFG_ADMIN_PASS_WARN'		=> 'ATTENTION : Cela remplace le mot de passe admin de toute installation précédente.',
	'LBL_SITECFG_ADMIN_PASS'			=> 'Mot de passe administrateur SuiteCRM',
	'LBL_SITECFG_APP_ID'				=> 'Application',
	'LBL_SITECFG_CUSTOM_ID_DIRECTIONS'	=> 'Si sélectionné, vous devez fournir un ID d\'application pour substituer le code généré automatiquement. L\'ID veille à ce que les séances d\'une instance de SuiteCRM ne sont pas utilisés par d\'autres instances.  Si vous disposez d\'un cluster d\'installations SuiteCRM, elles doivent partager le même ID de demande.',
	'LBL_SITECFG_CUSTOM_ID'				=> 'Fournir votre propre ID de l\'Application',
	'LBL_SITECFG_CUSTOM_LOG_DIRECTIONS'	=> 'Si sélectionné, vous devez spécifier un répertoire de journaux pour remplacer le répertoire par défaut de SuiteCRM. Peu importe où se trouve le fichier journal, l\'accès via un navigateur web sera limitée par un .htaccess redirect.',
	'LBL_SITECFG_CUSTOM_LOG'			=> 'Utilisez un répertoire personnalisé de Log',
	'LBL_SITECFG_CUSTOM_SESSION_DIRECTIONS'	=> 'Si sélectionné, vous devez fournir un dossier sécurisé pour le stockage des informations de session SuiteCRM. Cela peut être fait pour empêcher les données de session d\'être vulnérables sur des serveurs mutualisés.',
	'LBL_SITECFG_CUSTOM_SESSION'		=> 'Utiliser un répertoire de Session personnalisé pour SuiteCRM',
	'LBL_SITECFG_DIRECTIONS'			=> 'Veuillez entrer vos informations de configuration de site ci-dessous. Si vous n\'êtes pas sûr des champs, nous vous suggérons d\'utiliser les valeurs par défaut.',
	'LBL_SITECFG_FIX_ERRORS'			=> '<b>Veuillez réparer les erreurs suivantes avant de continuer :</b>',
	'LBL_SITECFG_LOG_DIR'				=> 'Répertoire des fichiers de log',
	'LBL_SITECFG_SESSION_PATH'			=> 'Chemin d\'accès au dossier de Session <br>(doit être accessible en écriture)',
	'LBL_SITECFG_SITE_SECURITY'			=> 'Choisir les options de sécurité',
	'LBL_SITECFG_SUGAR_UP_DIRECTIONS'	=> 'Si sélectionné, le système vérifiera périodiquement les mises à jour de l\'application.',
	'LBL_SITECFG_SUGAR_UP'				=> 'Vérifier automatiquement les mises à jour ?',
	'LBL_SITECFG_SUGAR_UPDATES'			=> 'Configuration des mises à jours SuiteCRM',
	'LBL_SITECFG_TITLE'					=> 'Configuration du site',
	'LBL_SITECFG_TITLE2'                => 'Identifier l\'utilisateur Admin',
	'LBL_SITECFG_SECURITY_TITLE'        => 'Sécurité du site',
	'LBL_SITECFG_URL'					=> 'URL de SuiteCRM',
	'LBL_SITECFG_USE_DEFAULTS'			=> 'Utiliser la configuration par défaut ?',
	'LBL_SITECFG_ANONSTATS'             => 'Envoyer des statistiques d\'usage anonymes ?',
	'LBL_SITECFG_ANONSTATS_DIRECTIONS'  => 'Si sélectionné, SuiteCRM enverra des statistiques <b>anonymes</b> sur l\'installation à SuiteCRM Inc. Chaque fois que votre système vérifie les nouvelles versions. Cette information nous aidera à mieux comprendre comment l\'application est utilisée et nous guide pour les améliorations au produit.',
	'LBL_SITECFG_URL_MSG'               => 'Entrez l\'URL qui sera utilisé pour accéder à SuiteCRM après l\'installation. L\'URL servira également comme base pour les URL dans les pages d\'application SuiteCRM. L\'URL doit inclure le serveur web ou la nom de l\'ordinateur ou l\'adresse IP.',
	'LBL_SITECFG_SYS_NAME_MSG'          => 'Entrez un nom pour votre système.  Ce nom apparaît dans la barre de titre du navigateur lorsque les utilisateurs visitent l\'application SuiteCRM.',
	'LBL_SITECFG_PASSWORD_MSG'          => 'Après l\'installation, vous devrez utiliser l\'utilisateur admin de SuiteCRM (par défaut le nom d\'utilisateur = admin) pour vous connecter à SuiteCRM.  Entrez un mot de passe pour cet administrateur. Ce mot de passe peut être changé après la connexion initiale.  Vous pouvez également entrer un autre nom que admin.',
	'LBL_SITECFG_COLLATION_MSG'         => 'Sélectionnez les paramètres de classement (tri) pour votre système. Ces réglages permettent d\'obtenir les tableaux avec le langage spécifique que vous utilisez. Dans le cas où votre langue ne nécessite pas de paramètres spéciaux, veuillez utiliser la valeur par défaut.',
	'LBL_SPRITE_SUPPORT'                => 'Support de sprite',
	'LBL_SYSTEM_CREDS'                  => 'Informations d\'identification système',
	'LBL_SYSTEM_ENV'                    => 'Environnement du système',
	'LBL_START'							=> 'Début',
	'LBL_SHOW_PASS'                     => 'Montrer les mots de passe',
	'LBL_HIDE_PASS'                     => 'Cacher les mots de passe',
	'LBL_HIDDEN'                        => '<i>(caché)</i>',
	'LBL_STEP1' => 'Etape 1 sur 2 - Prérequis d\'installation',
	'LBL_STEP2' => 'Etape 2 sur 2 - Configuration',

	'LBL_CHOOSE_LANG'					=> '<b>Choisir votre langue</b>',
	'LBL_STEP'							=> 'Etape',
	'LBL_TITLE_WELCOME'					=> 'Bienvenue dans SuiteCRM',
	'LBL_WELCOME_1'						=> 'Ce programme d\'installation crée les tables de base de données SuiteCRM et définit les variables de configuration dont vous avez besoin pour démarrer. L\'ensemble du processus devrait prendre environ dix minutes.',
	'LBL_WELCOME_2'						=> 'Pour la documentation d\'installation, veuillez visiter le site <a href="http://www.SuiteCRM.com/" target="_blank"> SuiteCRM</a>.  <BR><BR>, Vous pouvez également trouver de l\'aide avec la communauté de SuiteCRM dans les <a href="http://www.SuiteCRM.com/" target="_blank"> Forums de SuiteCRM</a>.',
	//welcome page variables
	'LBL_TITLE_ARE_YOU_READY'            => 'Êtes-vous prêt à installer ?',
	'REQUIRED_SYS_COMP' => 'Composants système requis',
	'REQUIRED_SYS_COMP_MSG' =>
		'Before you begin, please be sure that you have the supported versions of the following system components:<br>
                      <ul>
                      <li> Database/Database Management System (Examples: MariaDB, MySQL or SQL Server)</li>
                      <li> Web Server (Apache, IIS)</li>
                      </ul>
                      Consult the Compatibility Matrix in the Release Notes for
                      compatible system components for the SuiteCRM version that you are installing.<br>',
	'REQUIRED_SYS_CHK' => 'Vérification système initiale',
	'REQUIRED_SYS_CHK_MSG' =>
		'When you begin the installation process, a system check will be performed on the web server on which the SuiteCRM files are located in order to
                      make sure the system is configured properly and has all of the necessary components
                      to successfully complete the installation. <br><br>
                      The system checks all of the following:<br>
                      <ul>
                      <li><b>PHP version</b> &#8211; must be compatible with the application</li>
                      <li><b>Session Variables</b> &#8211; must be working properly</li>
                      <li><b>MB Strings</b> &#8211; must be installed and enabled in php.ini</li>
                      <li><b>Database Support</b> &#8211; must exist for MariaDB, MySQL or SQL Server</li>
                      <li><b>Config.php</b> &#8211; must exist and must have the appropriate permissions to make it writeable</li>
                      <li>The following SuiteCRM files must be writeable:<ul><li><b>/custom</li>
                      <li>/cache</li>
                      <li>/modules</li>
                      <li>/upload</b></li></ul></li></ul>
                                  If the check fails, you will not be able to proceed with the installation. 
                                  An error message will be displayed, explaining why your system did not pass the check.
                                  After making any necessary changes, you can undergo the system check again to continue the installation.<br>',





	'REQUIRED_INSTALLTYPE' => 'Installation standard ou personnalisée',
	'REQUIRED_INSTALLTYPE_MSG' =>
		'Après que les vérifications système aient été effectuées, vous pouvez choisir
                      une installation <b>Standard</b> ou <b>Personnalisée</b>.<br><br>
                      Que vous ayez choisi une installation Standard ou Personnalisée, vous allez avoir besoin des éléments suivants :<br>
                      <ul>
                      <li> <b>Le type de base de données</b> utilisée pour les données de SuiteCRM <ul><li>Les bases de données suivantes sont compatibles : MariaDB, MySQL or SQL Server.<br><br></li></ul></li>
                      <li> <b>Le nom de votre serveur web</b> ou la machine (host) sur laquelle la base de données est installée
                      <ul><li>Ce peut-être <i>localhost</i> si la base de données est hébergée en local sur votre ordinateur ou s\'il s\'agit du même serveur que celui qui héberger vos fichiers SuiteCRM.<br><br></li></ul></li>
                      <li><b>Le nom de la base de données</b> que vous voulez utiliser pour vos données SuiteCRM</li>
                        <ul>
                          <li> Dans le cas ou vous souhaiteriez utiliser une base de données existante, l\'utilisation d\'un nom de base identique à celui d\'une base existante provoquera un écrasement des données lors de la création du schéma de base.</li>
                          <li> Si vous ne disposez pas déjà d\'une base de données existante, le nom fourni sera appliqué à la base de données crée pendant l\'installation.<br><br></li>
                        </ul>
                      <li><b>Le nom et le mot de passe du compte "administrateur" de la base de données</b> <ul><li>L\'administrateur de la base de données doit être en mesure de créer des tables, des utilisateurs et d\'écrire dans la base de données.</li><li>Vous pouvez être amené à contacteur l\'administrateur de votre système informatique pour cette information si la base de donnée ne se trouve pas en local sur votre ordinateur ou si vous n\'êtes pas vous même l\'administrateur de la base de données.<br><br></ul></li></li>
                      <li> <b>Le nom et le mot de passe du compte utilisateur de la base de données SuiteCRM</b>
                      </li>
                        <ul>
                          <li> L\'utilisateur peut être l\'administrateur de la base de données où vous pouvez indiquer le nom d\'un autre "utilisateur" de la base de données. </li>
                          <li> Si vous souhaitez créer un nouvel utilisateur pour cette base de données, vous serez en mesure de le créer (nom et mot de passe) pendant le processus d\'installation de SuiteCRM</li>
                        </ul></ul><p>

                      Pour une installation <b>Personnalisée</b>, Vous pouvez également avoir besoin des éléments suivants :<br>
                      <ul>
                      <li> <b>L\'URL utilisée pour accéder à votre installation SuiteCRM</b>.
                      Cette URL peut être le nom de la machine ou du serveur, comme une adresse IP.<br><br></li>
                                  <li> [Optionnel] <b>Le chemin du répertoire de la session SuiteCRM</b> si vous souhaitez utiliser un répertoire personnalisé pour protéger les informations de toute vulnérabilité en cas d\'utilisation sur un serveur partagé (mutualisé).<br><br></li>
                                  <li> [Optionnel] <b>Le chemin du répertoire personnalisé pour les Logs</b> si vous ne souhaitez pas utiliser l\'emplacement par défaut de SuiteCRM.<br><br></li>
                                  <li> [Optionnel] <b>L\'ID d\'application</b> si vous ne souhaitez pas utiliser l\'ID d\'application auto-généré. Cet ID contrôle que des sessions d\'une instance SuiteCRM ne puissent pas être utilisées sur une autre instance.<br><br></li>
                                  <li><b>Le type de caractères</b> le plus communément utilisé selon vos paramètres régionaux.<br><br></li></ul>
                                  Veuillez consulter le guide d\'installation pour des informations plus détaillées.
                                ',
	'LBL_WELCOME_PLEASE_READ_BELOW' => 'Veuillez lire les informations suivantes avant de procéder à l\'installation.  Ces informations vous aideront à déterminer si oui ou non vous êtes prêt à installer l\'application.',

	'LBL_WELCOME_CHOOSE_LANGUAGE'		=> '<b>Choisissez votre langue</b>',
	'LBL_WELCOME_SETUP_WIZARD'			=> 'Assistant d\'installation',
	'LBL_WELCOME_TITLE_WELCOME'			=> 'Bienvenue dans SuiteCRM',
	'LBL_WELCOME_TITLE'					=> 'Assistant d\'installation SuiteCRM',
	'LBL_WIZARD_TITLE'					=> 'Assistant d\'installation SuiteCRM :',
	'LBL_YES'							=> 'Oui',
	'LBL_YES_MULTI'                     => 'Oui - sur plusieurs octets',
	// OOTB Scheduler Job Names:
	'LBL_OOTB_WORKFLOW'		=> 'Actions des Processus de Workflow',
	'LBL_OOTB_REPORTS'		=> 'Lancer les actions planifiées de génération de rapports',
	'LBL_OOTB_IE'			=> 'Vérifier les boîtes emails entrants',
	'LBL_OOTB_BOUNCE'		=> 'Lancer le processus de nuit des Campagnes d&#39;Emails de type Bounce',
	'LBL_OOTB_CAMPAIGN'		=> 'Lancer de nuit les Campagnes d&#39;Emailing',
	'LBL_OOTB_PRUNE'		=> 'Purger la BDD le premier de chaque mois',
	'LBL_OOTB_TRACKER'		=> 'Purger les tables de suivi des évènements',
	'LBL_OOTB_SUGARFEEDS'   => 'Tables Prune SuiteCRM',
	'LBL_OOTB_SEND_EMAIL_REMINDERS'	=> 'Exécuter les notifications par email',
	'LBL_UPDATE_TRACKER_SESSIONS' => 'Table de mise à jour tracker_sessions',
	'LBL_OOTB_CLEANUP_QUEUE' => 'Nettoyer la file des jobs',
	'LBL_OOTB_REMOVE_DOCUMENTS_FROM_FS' => 'Suppression des documents du système de fichier',


	'LBL_PATCHES_TITLE'     => 'Installer les derniers correctifs',
	'LBL_MODULE_TITLE'      => 'installer les packs de langues',
	'LBL_PATCH_1'           => 'Si vous souhaitez passer cette étape, clickez sur "suivant"',
	'LBL_PATCH_TITLE'       => 'Correctif système',
	'LBL_PATCH_READY'       => 'Les correctifs suivants sont prêts à être installés :',
	'LBL_SESSION_ERR_DESCRIPTION'		=> "SuiteCRM s'appuie sur les sessions PHP pour stocker des informations importantes tout en étant connecté à ce serveur web.  Votre installation de PHP n'a pas les informations de Session configurées correctement.
											<br><br>Une mauvaise configuration commune est que la directive de <b>'session.save_path'</b> ne pointe pas vers un répertoire valide.  <br><br>S'il vous plaît corriger votre <a target=_new href='http://us2.php.net/manual/en/ref.session.php'> configuration de PHP</a> dans le fichier php.ini situé ici dessous.",
	'LBL_SESSION_ERR_TITLE'				=> 'Erreur de Configuration des Sessions PHP',
	'LBL_SYSTEM_NAME'=>'Nom du Système',
	'LBL_COLLATION' => 'Paramètres de classement',
	'LBL_REQUIRED_SYSTEM_NAME'=>'Fournissez un nom de système pour l\'instance de SuiteCRM.',
	'LBL_PATCH_UPLOAD' => 'Choisir un fichier de correctif à partir de l\'ordinateur local',
	'LBL_INCOMPATIBLE_PHP_VERSION' => 'PHP version 5 ou supérieure est requis.',
	'LBL_MINIMUM_PHP_VERSION' => 'Version minimale de PHP requise : 5.1.0 - SuiteCRM recommande PHP version 5.2.x',
	'LBL_YOUR_PHP_VERSION' => '(Votre version courante de PHP est la',
	'LBL_RECOMMENDED_PHP_VERSION' =>'La version recommandée est la 5.2.x)',
	'LBL_BACKWARD_COMPATIBILITY_ON' => 'Php Backward Compatibility mode est positionné à on. Mettre zend.ze1_compatibility_mode à Off pour pouvoir continuer',
	'LBL_STREAM' => 'PHP permet d\'utiliser les flux',

	'advanced_password_new_account_email' => array(
		'subject' => 'Coordonnées du nouveau compte',
		'description' => 'Ce modèle est utilisé lorsque l\'administrateur système envoie un nouveau mot de passe à un utilisateur.',
		'body' => '<div><table border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\" width="550" align=\\"\\&quot;\\&quot;center\\&quot;\\&quot;\\"><tbody><tr><td colspan=\\"2\\"><p>Voici votre nom d\'utilisateur et votre mot de passe temporaire :</p><p>Nom d\'utilisateur : $contact_user_user_name </p><p>Mot de passe : $contact_user_user_hash </p><br><p>$config_site_url</p><br><p>Après vous être logué en utilisant le mot de passe ci-dessus, vous pourrez le réinitialiser avec un mot de passe de votre choix.</p>   </td>         </tr><tr><td colspan=\\"2\\"></td>         </tr> </tbody></table> </div>',
		'txt_body' =>
			'
Vous trouverez ci-après votre nom d\'utilisateur et votre mot de passe provisoire :
Nom d\'utilisateur : $contact_user_user_name
Mot de passe : $contact_user_user_hash

$config_site_url

Après votre connexion avec le mot de passe provisoire ci-dessus, il peut vous être demandé de le réinitialiser avec un nouveau mot de passe de votre choix.',
		'name' => 'E-mail de mot de passe généré par le système',
	),
	'advanced_password_forgot_password_email' => array(
		'subject' => 'Réinitialisez le mot de passe de votre compte',
		'description' => "Ce modèle est utilisé pour envoyer à l'utilisateur un lien à cliquer pour réinitialiser son mot de passe.",
		'body' => '<div><table border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\" width="550" align=\\"\\&quot;\\&quot;center\\&quot;\\&quot;\\"><tbody><tr><td colspan=\\"2\\"><p>Vous avez récemment demandé à modifier le mot de passe du compte $contact_user_pwd_last_changed. </p><p>Cliquez sur le lien ci-dessous pour réinitialiser le mot de passe : </p><p> $contact_user_link_guid </p>  </td>         </tr><tr><td colspan=\\"2\\"></td>         </tr> </tbody></table> </div>',
		'txt_body' =>
			'
Vous avez récemment demandé sur $contact_user_pwd_last_changed à pouvoir réinitialiser votre mot de passe.

Suivez le lien ci-dessous celui-ci :

$contact_user_link_guid',
		'name' => 'E-mail de mot de passe oublié',
	),

	// SMTP settings

	'LBL_WIZARD_SMTP_DESC' => 'Fournissez le compte de messagerie qui sera utilisé pour envoyer des emails, tels que les notifications d&#39;assignations et les mots de passe des nouveaux utilisateurs. Les utilisateurs recevront les emails de SuiteCRM envoyés à partir du compte email spécifié.',
	'LBL_CHOOSE_EMAIL_PROVIDER'        => 'Choisissez votre fournisseur de messagerie email fzmploykjchkj:',

	'LBL_SMTPTYPE_GMAIL'                    => 'Gmail',
	'LBL_SMTPTYPE_YAHOO'                    => 'Yahoo! Mail',
	'LBL_SMTPTYPE_EXCHANGE'                 => 'Microsoft Exchange',
	'LBL_SMTPTYPE_OTHER'                  => 'Autre',
	'LBL_MAIL_SMTP_SETTINGS'           => 'Configuration SMTP',
	'LBL_MAIL_SMTPSERVER'				=> 'Serveur SMTP:',
	'LBL_MAIL_SMTPPORT'					=> 'Port SMTP :',
	'LBL_MAIL_SMTPAUTH_REQ'				=> 'Utiliser l\'authentification SMTP?',
	'LBL_EMAIL_SMTP_SSL_OR_TLS'         => 'Activer SMTP au travers de SSL ou TLS?',
	'LBL_GMAIL_SMTPUSER'					=> 'Gmail - Email:',
	'LBL_GMAIL_SMTPPASS'					=> 'Gmail - Mot de passe:',
	'LBL_ALLOW_DEFAULT_SELECTION'           => 'Autoriser les utilisateurs à utiliser ces paramétres pour l\'envoi d\'emails:',
	'LBL_ALLOW_DEFAULT_SELECTION_HELP'          => 'Lorsque cette option est sélectionnée, tous les utilisateurs seront en mesure d\'envoyer des emails en utilisant le même serveur d\'envoi d\'emails, ces paramétres sont aussi utilisé pour envoyer les notifications et les alertes du système. Si cette option n\'est pas sélectionnée, les utilisateurs pourront toujours utiliser le serveur d\'envoi d\'emails de leurs choix après avoir fourni leurs informations dans leur compte utilisateur.',

	'LBL_YAHOOMAIL_SMTPPASS'					=> 'Yahoo! Mail - Mot de passe:',
	'LBL_YAHOOMAIL_SMTPUSER'					=> 'Yahoo! Mail - Email:',

	'LBL_EXCHANGE_SMTPPASS'					=> 'Exchange - Mot de passe:',
	'LBL_EXCHANGE_SMTPUSER'					=> 'Exchange - Nom Utilisateur:',
	'LBL_EXCHANGE_SMTPPORT'					=> 'Exchange - Port SMTP:',
	'LBL_EXCHANGE_SMTPSERVER'				=> 'Exchange - Serveur SMTP:',


	'LBL_MAIL_SMTPUSER'					=> 'SMTP login:',
	'LBL_MAIL_SMTPPASS'					=> 'Mot de passe SMTP :',

	// Branding

	'LBL_WIZARD_SYSTEM_TITLE' => 'Identité visuelle',
	'LBL_WIZARD_SYSTEM_DESC' => 'Fournissez le nom et le logo de votre organisation afin de personnaliser votre SuiteCRM.',
	'SYSTEM_NAME_WIZARD'=>'Nom:',
	'SYSTEM_NAME_HELP'=>'C\'est le nom qui s\'affiche dans la barre de titre de votre navigateur.',
	'NEW_LOGO'=>'Choisissez logo (450x17)',
	'NEW_LOGO_HELP'=>'L\'image doit être au format .png ou .jpg. La hauteur maximale est de 170px et la largeur maximale est de 450px. Toutes images aux dimensions supérieures à ces valeurs sera redimensionnée aux valeurs maximales indiquées.',
	'COMPANY_LOGO_UPLOAD_BTN' => 'Uploader',
	'CURRENT_LOGO'=>'Logo actuel',
	'CURRENT_LOGO_HELP'=>'Ce logo est affiché dans le coin en haut à gauche de votre application SuiteCRM.',


	//Scenario selection of modules
	'LBL_WIZARD_SCENARIO_TITLE' => 'Sélection de scénario',
	'LBL_WIZARD_SCENARIO_DESC' => 'Il s’agit de permettre de présenter les modules selon vos besoins.  Chaque module peut être activé après l’installation à l’aide de la page d’administration.',
	'LBL_WIZARD_SCENARIO_EMPTY'=> 'Il n’y a aucun scénario actuellement définis dans le fichier de configuration (config.php)',



	// System Local Settings


	'LBL_LOCALE_TITLE' => 'Paramètres régionaux du système',
	'LBL_WIZARD_LOCALE_DESC' => 'Précisez comment vous souhaitez afficher vos données dans SuiteCRM, basé sur votre situation géographique. Les paramètres que vous fournissez ici seront les paramètres par défaut. Les utilisateurs pourront définir leurs propres préférences dans Mon compte.',
	'LBL_DATE_FORMAT' => 'Format de date :',
	'LBL_TIME_FORMAT' => 'Format de temps:',
	'LBL_TIMEZONE' => 'Fuseau horaire :',
	'LBL_LANGUAGE'=>'Langue:',
	'LBL_CURRENCY'=>'Devise :',
	'LBL_CURRENCY_SYMBOL'=>'Symbole de la devise :',
	'LBL_CURRENCY_ISO4217' => 'Codification de la devise ISO 4217 :',
	'LBL_NUMBER_GROUPING_SEP' => 'Séparateur des milliers',
	'LBL_DECIMAL_SEP' => 'Séparateur pour les nombres décimaux',
	'LBL_NAME_FORMAT' => 'Format du nom :',
	'UPLOAD_LOGO' => 'Veuillez patienter, chargement du logo.',
	'ERR_UPLOAD_FILETYPE' => 'Format de fichier non autorisé, veuillez télécharger un fichier jpeg ou png.',
	'ERR_LANG_UPLOAD_UNKNOWN' => 'Une erreur inconnue s\'est produite lors du chargement du fichier.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_INI_SIZE' => 'Le fichier chargé dépasse la valeur upload_max_filesize dans php.ini.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_FORM_SIZE' => 'Le fichier chargé dépasse la valeur MAX_FILE_SIZE spécifiée dans le formulaire HTML.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_PARTIAL' => 'Le fichier a été chargé partiellement.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_NO_FILE' => 'Aucun fichier chargé.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_NO_TMP_DIR' => 'Répertoire temporaire absent.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_CANT_WRITE' => 'Echec d&#39;écriture du fichier sur le disque.',
	'ERR_UPLOAD_FILE_UPLOAD_ERR_EXTENSION' => 'Une extension PHP a stoppé le téléchargement du fichier. PHP ne fournit pas le moyen de connaître l\'extension qui a stoppé le téléchargement du fichier.',

	'LBL_INSTALL_PROCESS' => 'Installation...',

	'LBL_EMAIL_ADDRESS' => 'Email:',
	'ERR_ADMIN_EMAIL' => 'L\'adresse de courriel de l\'administrateur est incorrecte.',
	'ERR_SITE_URL' => 'L\'URL du site est nécessaire.',

	'STAT_CONFIGURATION' => 'Relations de configuration...',
	'STAT_CREATE_DB' => 'Créer une base de données...',

	'STAT_CREATE_DEFAULT_SETTINGS' => 'Création des paramètres par défaut...',
	'STAT_INSTALL_FINISH' => 'Installation terminée...',
	'STAT_INSTALL_FINISH_LOGIN' => 'Le processus d\'installation est terminé, <a href="%s"> veuillez ouvrir une session...</a>',
	'LBL_LICENCE_TOOLTIP' => 'Veuillez accepter la licence en premier',

	'LBL_MORE_OPTIONS_TITLE' => 'Plus d\'options',
	'LBL_START' => 'Début',
	'LBL_DB_CONN_ERR' => 'Erreur de base de données'


);

?>
