<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/*********************************************************************************

 * Description:    Defines the English language pack for the base application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

 
$mod_strings = array (
    'LBL_GOOD_FILE' => 'Lecture du fichier à importer réussie',
    'LBL_RECORDS_SKIPPED_DUE_TO_ERROR' => 'enregistrement(s) non importés en raison d&#39;une erreur',
    'LBL_UPDATE_SUCCESSFULLY' => 'enregistrement(s) mis à jour avec succès',
    'LBL_SUCCESSFULLY_IMPORTED' => 'enregistrement(s) créé(s) avec succès',
    'LBL_STEP_4_TITLE' => 'Etape {0} : Import du fichier',
    'LBL_STEP_5_TITLE' => 'Etape {0} : Visualisation des résultats',
    'LBL_CUSTOM_ENCLOSURE' => 'Caractère de protection:',
    'LBL_ERROR_UNABLE_TO_PUBLISH' => 'Impossible de publier ce mapping. Un autre mapping publié existe déja avec ce nom.',
    'LBL_ERROR_UNABLE_TO_UNPUBLISH' => 'Impossible de dépublier un mapping appartenant à un autre utilisateur. Vous possédez un mapping avec le même nom.',
    'LBL_ERROR_IMPORTS_NOT_SET_UP' => 'Les imports ne peuvent pas être mis en place pour ce type de module',
    'LBL_IMPORT_TYPE' => 'Que souhaitez vous faire avec les données importées ?',
    'LBL_IMPORT_BUTTON' => 'Créer des enregistrements',
    'LBL_UPDATE_BUTTON' => 'Créer et mettre à jour des enregistrements (ID obligatoire)',
    'LBL_CREATE_BUTTON_HELP' => 'Utiliser cette option pour créer de nouveaux enregistrements. Remarque: Les lignes dans le fichier importé qui contiennent des valeurs qui correspondent à des ID existants ne seront pas importées si le champ ID de votre fichier est mappé sur le champ ID de SuiteCRM.',
    'LBL_UPDATE_BUTTON_HELP' => 'Utiliser cette option pour mettre à jour des enregistrements existants. La correspondance entre les données dans le fichier d&#39;import et les données existantes sera réalisée sur le champ ID de SuiteCRM.',
    'LBL_ERROR_INVALID_BOOL'=>'Valeur invalide (doit être 1 ou 0)',
    'LBL_NO_ID' => 'ID Requis',
    'LBL_PRE_CHECK_SKIPPED' => 'Pré-vérification sautée',
    'LBL_IMPORT_ERROR' => 'Erreurs survenues lors de l&#39;import',
    'LBL_ERROR' => 'Erreur:',
    'LBL_NOLOCALE_NEEDED' => 'Pas de conversion locale nécessaire',
    'LBL_FIELD_NAME' => 'Nom du champ',
    'LBL_VALUE' => 'Valeur',
    'LBL_ROW_NUMBER' => 'Numéro de la ligne',
    'LBL_NONE' => 'Aucun',
    'LBL_REQUIRED_VALUE' => 'Valeur obligatoire manquante',
    'LBL_ERROR_SYNC_USERS' => 'Valeur invalide pour synchroniser vers Outlook',
    'LBL_ID_EXISTS_ALREADY' => 'Cet ID existe déjà dans la base de données',
    'LBL_ASSIGNED_USER' => 'Si l&#39;utilisateur n&#39;existe pas, utiliser l&#39;utilisateur courant',
    'LBL_SHOW_HIDDEN' => 'Visaualiser les champs qui, normalement, ne peuvent pas être importés',
    'LBL_UPDATE_RECORDS' => 'Mettre à jour les enregistrements existants au lieu de les importer à nouveau (pas d&#39;annulation possible)',
    'LBL_TEST'=> 'Tester l&#39;import (ne sauvegarde pas et ne change pas les données contenu dans la base)',
    'LBL_TRUNCATE_TABLE' => 'Vider la table avant l&#39;import (supprime tous les enregistrements)',
    'LBL_RELATED_ACCOUNTS' => 'Ne pas créer les comptes liés',
    'LBL_NO_DATECHECK' => 'Sauter la vérification de date (rend l&#39;import plus rapide mais le fera échouer si une date est mal formatée)',
    'LBL_NO_EMAILS' => 'Ne pas envoyer des emails de notification durant cet import',
    'LBL_NO_PRECHECK' => 'Mode : Format natif',
    'LBL_STRICT_CHECKS' => 'Utiliser des règles strictes (Vérification des adresses emails et des numéros de téléphone)',
    'LBL_ERROR_SELECTING_RECORD' => 'Erreur dans les enregistrements sélectionnés :',
    'LBL_ERROR_DELETING_RECORD' => 'Erreur lors de la suppression des enregistrements :',
    'LBL_NOT_SET_UP' => 'Les imports ne sont pas mis en place pour ce type de module',
    'LBL_ARE_YOU_SURE' => 'Etes-vous sûr(e)? Cela effacera toutes les données de ce module.',
    'LBL_NO_RECORD' => 'Aucun enrgistrement avec cet ID n°a été mis à jour',
    'LBL_NOT_SET_UP_FOR_IMPORTS' => 'Les imports ne sont pas mis en place pour ce type de module',
    'LBL_DEBUG_MODE' => 'Activer le mode debug',
    'LBL_ERROR_INVALID_ID' => 'Le champ ID fourni est trop long (la longeur maximale est de 36 caractères)',
    'LBL_ERROR_INVALID_PHONE' => 'Numéro de téléphone invalide',
    'LBL_ERROR_INVALID_NAME' => 'La chaîne est trop longue',
    'LBL_ERROR_INVALID_VARCHAR' => 'La chaîne est trop longue',
    'LBL_ERROR_INVALID_DATE' => 'Date est invalide',
    'LBL_ERROR_INVALID_DATETIME' => 'Datetime invalide',
    'LBL_ERROR_INVALID_DATETIMECOMBO' => 'Datetime invalide',
    'LBL_ERROR_INVALID_TIME' => 'Temps invalide',
    'LBL_ERROR_INVALID_INT' => 'Entier invalide',
    'LBL_ERROR_INVALID_NUM' => 'Numérique invalide',
    'LBL_ERROR_INVALID_EMAIL'=>'Adresse email invalide',
    'LBL_ERROR_INVALID_USER'=>'Nom ou ID utilisateur invalide',
    'LBL_ERROR_INVALID_TEAM' => 'Nom ou ID equipe invalide',
    'LBL_ERROR_INVALID_ACCOUNT' => 'Nom ou ID compte invalide',
    'LBL_ERROR_INVALID_RELATE' => 'Champ relatif invalide',
    'LBL_ERROR_INVALID_CURRENCY' => 'Montant ou Devise invalide',
    'LBL_ERROR_INVALID_FLOAT' => 'Séparateur décimal invalide',
    'LBL_ERROR_NOT_IN_ENUM' => 'Clé absente dans la liste. Les valeurs possibles sont: ',
    'LBL_NOT_MULTIENUM' => 'Clé absente dans la liste.',
    'LBL_IMPORT_MODULE_NO_TYPE' => 'Les imports ne sont pas mis en place pour ce type de module',
    'LBL_IMPORT_MODULE_NO_USERS' => 'ATTENTION: Vous n&#39;avez pas d&#39;utilisateurs définis dans votre application. Si vous faites des imports en n&#39;ayant pas ajouté vos utilisateurs avant, tous les enregistrements seront assignés à l&#39;administrateur.',
    'LBL_IMPORT_MODULE_MAP_ERROR' => 'Impossible de publier ce mapping. Un autre mapping est déjà publié avec ce nom.',
    'LBL_IMPORT_MODULE_MAP_ERROR2' => 'Impossible de dépublier un mapping appartenant à un autre utilisateur. Vous possédez un mapping avec le même nom.',
    'LBL_IMPORT_MODULE_NO_DIRECTORY' => 'Le répertoire',
    'LBL_IMPORT_MODULE_NO_DIRECTORY_END' => 'n&#39;existe pas ou il n&#39;est pas possible d&#39;y écrire',
    'LBL_IMPORT_MODULE_ERROR_NO_UPLOAD' => 'Le fichier n&#39;a pas été envoyé correctement, veuillez réessayer et vérifiez bien que la variable "upload_max_filesize" du fichier php.ini est supérieure à la taille de votre fichier',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE' => 'Fichier trop volumineux. Max:',
    'LBL_IMPORT_MODULE_ERROR_LARGE_FILE_END' => 'KOctets. Modifier  \' upload_maxsize \' dans le fichier config.php',
    'LBL_MODULE_NAME' => 'Import -',
    'LBL_TRY_AGAIN' => 'Nouvel import',
    'LBL_START_OVER' => 'Recommencer depuis le début',
    'LBL_IMPORT_ERROR_MAX_REC_LIMIT_REACHED' => 'Le fichier importé contient {0} lignes. Le nombre optimum de lignes est {1}. Plus de lignes peut ralentir le process d&#39;import. Cliquer sur OK pour continuer cet import. Cliquer Annuler pour revoir le fichier et réimporter un fichier à importer.',
    'ERR_IMPORT_SYSTEM_ADMININSTRATOR'  => 'Vous ne pouvez pas importer des utilisateurs de type administrateur',
    'ERR_MULTIPLE' => 'Plusieurs colonnes ont étés définies avec le même nom de champ en sortie.',
    'ERR_MISSING_REQUIRED_FIELDS' => 'Champ(s) obligatoire(s) manquant:',
    'ERR_MISSING_MAP_NAME' => 'Nom de mapping manquant',
    'ERR_SELECT_FULL_NAME' => 'Vous ne pouvez pas sélectionner le nom lorsque le nom et le prénom sont sélectionnés.',
    'ERR_SELECT_FILE' => 'Vous devez sélectionner un fichier à importer.',
    'LBL_SELECT_FILE' => 'Sélectionnez le fichier:',
    'LBL_CUSTOM' => 'Personnalisé',
    'LBL_CUSTOM_CSV' => '&nbsp;Un fichier dont les champs sont délimités par des virgules ou autre',
    'LBL_CSV' => '&nbsp;Un fichier dont les champs sont délimités par des <b>virgules</b>',
    'LBL_EXTERNAL_SOURCE' => 'une application externe ou un service',
    'LBL_TAB' => '&nbsp;Un fichier dont les champs sont délimités par des <b>tabulations</b>',
    'LBL_CUSTOM_DELIMITED' => '&nbsp;Un fichier dont les champs sont délimités par <b>autre chose</b> que des virgules ou des tabulations',
    'LBL_CUSTOM_DELIMITER' => 'Délimiteur:',
    'LBL_FILE_OPTIONS' => 'Options du fichier',
    'LBL_CUSTOM_TAB' => '&nbsp;Format personnel délimité par des tabulations',
    'LBL_DONT_MAP' => '-- Ne pas importer --',
    'LBL_STEP_MODULE' => 'Dans quel module souhaitez vous importer des données ?',
    'LBL_STEP_1_TITLE' => 'Etape 1: Sélection de la source de données',
    'LBL_CONFIRM_TITLE' => 'Etape {0}: Confirmer les paramètres d&#39;import de fichier',
    'LBL_CONFIRM_EXT_TITLE' => 'Etape {0}: Confirmer les propriétés des sources externes',
    'LBL_WHAT_IS' => 'Quelle est la source de vos données?',
    'LBL_MICROSOFT_OUTLOOK' => '&nbsp;Microsoft Outlook',
    'LBL_MICROSOFT_OUTLOOK_HELP' => 'Les mappings personnalisés pour Microsoft Outlook repose sur un format de fichier avec séparateur virgule (.csv). Si votre fichier d&#39;import est délimité par des tabulations, le mapping ne sera pas appliqué correctement.',
    'LBL_ACT' => 'Act!',
    'LBL_SALESFORCE' => '&nbsp;Salesforce.com',
    'LBL_MY_SAVED' => 'Mes mappings sauvegardés:',
    'LBL_PUBLISH' => 'Mapping Privé - Cliquez ici pour le rendre public',
    'LBL_DELETE' => 'Supprimer',
    'LBL_PUBLISHED_SOURCES' => 'Mapping(s) public(s):',
    'LBL_UNPUBLISH' => 'Mapping Public - Cliquez ici pour le rendre privé',
    'LBL_NEXT' => 'Suivant >',
    'LBL_BACK' => '< Retour',
    'LBL_STEP_2_TITLE' => 'Etape 2: Upload du fichier à importer',
    'LBL_HAS_HEADER' => 'Le fichier importé contient-il une ligne d&#39;en-tête:',
    'LBL_NUM_1' => '1.',
    'LBL_NUM_2' => '2.',
    'LBL_NUM_3' => '3.',
    'LBL_NUM_4' => '4.',
    'LBL_NUM_5' => '5.',
    'LBL_NUM_6' => '6.',
    'LBL_NUM_7' => '7.',
    'LBL_NUM_8' => '8.',
    'LBL_NUM_9' => '9.',
    'LBL_NUM_10' => '10.',
    'LBL_NUM_11' => '11.',
    'LBL_NUM_12' => '12.',
    'LBL_NOTES' => 'Notes:',
    'LBL_NOW_CHOOSE' => 'Maintenant, choisir le fichier à importer:',
    'LBL_IMPORT_OUTLOOK_TITLE' => 'Microsoft Outlook 98 et 2000 peuvent exporter des données au format <b>séparateur : Virgule </b> qui peut être utilisé pour importer les données dans le système. Pour exporter vos données depuis Outlook, suivre les étapes suivantes :',
    'LBL_OUTLOOK_NUM_1' => 'Démarrez <b>Outlook</b>',
    'LBL_OUTLOOK_NUM_2' => 'Sélectionner le menu <b>Fichier</b> , et le sous-menu <b>Import et Export ...</b> ',
    'LBL_OUTLOOK_NUM_3' => 'Choisissez <b>Exporter vers un fichier</b> et cliquez sur suivant',
    'LBL_OUTLOOK_NUM_4' => 'Choisir <b>Séparateur Virgule (Windows)</b> et cliquer sur <b>Suivant</b>.<br>  Remarque: Il peut vous etre demandé d&#39;installer le composant d&#39;export',
    'LBL_OUTLOOK_NUM_5' => 'Selectionnez le répertoire <b>Contacts</b> et cliquez sur <b>Suivant</b>. Vous pouvez sélectionner différents répertoires contacts si vos contacts sont stockés dans de multiples répertoires.',
    'LBL_OUTLOOK_NUM_6' => 'Choisissez un nom de fichier et cliquer sur <b>Suivant</b>',
    'LBL_OUTLOOK_NUM_7' => 'Cliquez sur <b>Terminer</b>',
    'LBL_IMPORT_SF_TITLE' => 'Salesforce.com peut exporter des données au format <b>séparateur : Virgule</b> qui peut être utilisé pour importer les données dans le système. Pour exporter vos données depuis Salesforce.com, suivre les étapes suivantes :',
    'LBL_SF_NUM_1' => 'Ouvrez votre navigateur, saisir l&#39;url http://www.salesforce.com, et s&#39;identifier',
    'LBL_SF_NUM_2' => 'Cliquez sur l&#39;onglet Rapports dans le menu supérieur',
    'LBL_SF_NUM_3' => '<b>Pour exporter les Comptes</b>: Cliquez sur le lien Comptes actifs <br><b>Pour exporter les Contacts</b>: Cliquez sur le lien Mailing List',
    'LBL_SF_NUM_4' => '<b>Etape 1: Selectionner votre type de rapport</b>, selectionner <b>Tabular Report</b>cliquer sur <b>Suivant</b>',
    'LBL_SF_NUM_5' => 'Etape 2: Sélectionnez les colonnes du rapport , choisissez les colonnes que vous souhaitez exporter et cliquez sur Suivant',
    'LBL_SF_NUM_6' => 'Etape 3: Sélectionnez les informations à résumer, cliquer sur Suivant',
    'LBL_SF_NUM_7' => 'Etape 4: Ordonnez les colonnes du rapports, puis cliquez sur Suivant',
    'LBL_SF_NUM_8' => 'Etape 5: Sélectionnez les critères de votre rapport, pour le champ Date de démarrage, choisissez une date suffisamment éloignée pour inclure tous vos comptes. Vous pouvez aussi exporter une sous-sélection de ce rapport en utilisant de multiples critères. Une fois terminé, cliquez sur Lancer le rapport',
    'LBL_SF_NUM_9' => 'Un rapport sera généré, et l&#39;écran doit présenter Etat de la génération du rapport: Terminé. Ensuite cliquez sur Exporter vers Excel',
    'LBL_SF_NUM_10' => 'Dans Export du rapport:, comme Format de fichier d&#39;export:, choisissez Délimiteur Virgule .csv. Cliquez ensuite sur Exporter.',
    'LBL_SF_NUM_11' => 'Une boîte de dialogue va apparaître vous demandant de sauvegarder le fichier d&#39;export sur votre ordinateur.',
    'LBL_IMPORT_ACT_TITLE' => 'Act! peut exporter des données avec un fichier au format <b>séparer par une virgule</b>, cela peut être utilisé pour importer les données dans SuiteCRM. Pour exporter vos données depuis Act!, suiver les étapes suivantes :',
    'LBL_ACT_NUM_1' => 'Lancer <b>ACT!</b>',
    'LBL_ACT_NUM_2' => 'Sélectionner le menu <b>Fichier</b>, puis l&#39;option <b>Echange de Donnée</b>, et enfin l&#39;option <b>Export...</b>',
    'LBL_ACT_NUM_3' => 'Sélectionner le type de fichier <b>Texte avec délimiteur</b>',
    'LBL_ACT_NUM_4' => 'Choisir le nom de fichier et le lieu où sera stocké le fichier contenant les données exportées puis cliquer sur <b>Suivant</b>',
    'LBL_ACT_NUM_5' => 'Sélectionner <b>Seulement les Contacts</b>',
    'LBL_ACT_NUM_6' => 'Cliquer sur le bouton <b>Options...</b>',
    'LBL_ACT_NUM_7' => 'Sélectionner la <b>Virgule</b> comme caractère délimiteur de champs',
    'LBL_ACT_NUM_8' => 'Cocher la case <b>Oui, exporter les noms des champs</b> et cliquer sur <b>OK</b>',
    'LBL_ACT_NUM_9' => 'Cliquer sur <b>Suivant</b>',
    'LBL_ACT_NUM_10' => 'Sélectionner <b>Tous les Enregistrements</b> puis cliquer sur <b>Finir</b>',
    'LBL_IMPORT_CUSTOM_TITLE' => 'De nombreuses applications vous permettent d&#39;exporter des données au format Fichier texte, délimiteur : virgule (.csv). <br>Généralement, pour obtenir ce fichier  vous devez suivre les étapes suivantes:',
    'LBL_CUSTOM_NUM_1' => 'Lancez l&#39;application et ouvrez le fichier de données à exporter',
    'LBL_CUSTOM_NUM_2' => 'Selectionnez le menu <b>Enregistrer sous...</b> ou <b>Exporter...</b>',
    'LBL_CUSTOM_NUM_3' => 'Enregistrez le fichier dans un format <b>CSV</b> ou <b>Séparateur Virgule</b>',
    'LBL_IMPORT_TAB_TITLE' => 'De nombreuses applications vous permettront d&#39;exporter les données vers un <b>fichier séparés par des tabulations (.tsv ou .tab)</b>. En général sur la plupart des applications vous pouvez suivre ces étapes:',
    'LBL_TAB_NUM_1' => 'Lancez l&#39;application et ouvrez le fichier de données à exporter',
    'LBL_TAB_NUM_2' => 'Selectionnez le menu <b>Enregistrer sous...</b> ou <b>Exporter...</b>',
    'LBL_TAB_NUM_3' => 'Enregistrez le fichier dans un format <b>TSV</b> ou <b>Valeurs séparés par des tabulations</b>',
    'LBL_STEP_3_TITLE' => 'Etape 3: Mapping des champs et import',
    'LBL_STEP_DUP_TITLE' => 'Etape {0}: Vérification des doublons potentiels',
    'LBL_SELECT_FIELDS_TO_MAP' => 'Pour chaque colonne à importer à partir de votre fichier, sélectionnez le champ SuiteCRM correspondant. Une fois le mapping effectué, cliquez sur <b>Importer Maintenant</b>:',
    'LBL_DATABASE_FIELD' => 'Champ du module',
    'LBL_HEADER_ROW' => 'Ligne d&#39;en-tête',
    'LBL_HEADER_ROW_OPTION_HELP' => 'Cocher si la première ligne du fichier est une ligne d&#39;entête contenant les noms des champs.',
    'LBL_ROW' => 'Ligne',
    'LBL_SAVE_AS_CUSTOM' => 'Sauvegarder ce mapping sous:',
    'LBL_SAVE_AS_CUSTOM_NAME' => 'Nom du mapping :',
    'LBL_CONTACTS_NOTE_1' => 'Le champ "Nom" ou le champ "Prénom" doivent être mappés.',
    'LBL_CONTACTS_NOTE_2' => 'Si le champ "Nom" est mappé, les champs "Nom" et "Prénom" seront ignorés.',
    'LBL_CONTACTS_NOTE_3' => 'Si le champ "Nom" est mappé, les informations du champ "Nom" seront réparties dans les champs "Nom" et "Prénom" lors de l&#39;insertion dans la base.',
    'LBL_CONTACTS_NOTE_4' => 'Les champs "Rue 1" à "Rue 3" seront concaténés lors de l&#39;insertion dans la base de données.',
    'LBL_ACCOUNTS_NOTE_1' => 'Pour les champs liés à des liste déroulantes simples, vous devez importer une clé de la liste et non pas un libellé.',
    'LBL_REQUIRED_NOTE' => 'Champ(s) obligatoire(s) :',
    'LBL_IMPORT_NOW' => 'Importer Maintenant',
    'LBL_' => '',
    'LBL_CANNOT_OPEN' => 'Impossible d&#39;ouvrir le fichier importé en lecture.',
    'LBL_NOT_SAME_NUMBER' => 'Il n&#39;y a pas le même nombre de champs par ligne dans votre fichier',
    'LBL_NO_LINES' => 'Aucune ligne dans votre fichier d\'import',
    'LBL_FILE_ALREADY_BEEN_OR' => 'Le fichier d&#39;import à déjà à été utilisé ou n&#39;existe pas',
    'LBL_SUCCESS' => 'Opération terminée avec succès:<br>&nbsp;',
	'LBL_FAILURE' => 'L&#39;import a échoué :',
    'LBL_SUCCESSFULLY' => 'import(s) réussi(s)',
    'LBL_LAST_IMPORT_UNDONE' => 'Votre dernier import a été annulé.',
    'LBL_NO_IMPORT_TO_UNDO' => 'Il n&#39;y a pas d&#39;import à annuler.',
    'LBL_FAIL' => 'Echec:',
    'LBL_RECORDS_SKIPPED' => 'enregistrement(s) ignoré(s) parce qu&#39;il manquait au moins un champ obligatoire',
    'LBL_IDS_EXISTED_OR_LONGER' => 'enregistrement(s) ignorés parce que l&#39;identifiant importé (ID) existait déjà ou faisait plus de 36 caractéres',
    'LBL_RESULTS' => 'Résultats',
    'LBL_CREATED_TAB' => 'Enregistrements créés',
    'LBL_DUPLICATE_TAB' => 'Doublons',
    'LBL_ERROR_TAB' => 'Erreurs',
    'LBL_IMPORT_MORE' => 'Nouvel import',
    'LBL_FINISHED' => 'Retouner au listing des',
    'LBL_UNDO_LAST_IMPORT' => 'Annuler le dernier import',
    'LBL_LAST_IMPORTED'=>'Enregistrement(s) créé(s) dans la table',
    'ERR_MULTIPLE_PARENTS' => 'Vous ne pouvez définir qu&#39;un seul "Parent ID"',
    'LBL_DUPLICATES' => 'doublon(s) trouvé(s)',
    'LNK_DUPLICATE_LIST' => 'Télécharger la liste des doublons',
    'LNK_ERROR_LIST' => 'Cliquez ici pour télécharger la liste des erreurs',
    'LNK_RECORDS_SKIPPED_DUE_TO_ERROR' => 'Cliquez ici pour télécharger les enregistrements que vous n&#39;avez pas pu importer.',
    'LBL_UNIQUE_INDEX' => 'Choisissez un Index pour la comparaison de doublon',
    'LBL_VERIFY_DUPS' => 'Clé(s) identifiant les doublons',
    'LBL_INDEX_USED' => 'Clé(s) utilisée(s)',
    'LBL_INDEX_NOT_USED' => 'Clé(s) non utilisée(s)',
    'LBL_IMPORT_MODULE_ERROR_NO_MOVE' => 'Fichier n\'a pas été téléchargé. Vérifiez les autorisations de fichiers dans le répertoire cache de votre installation SuiteCRM.',
    'LBL_IMPORT_FIELDDEF_ID' => 'Numéro ID unique',
    'LBL_IMPORT_FIELDDEF_RELATE' => 'Nom ou ID',
    'LBL_IMPORT_FIELDDEF_PHONE' => 'Numéro de téléphone',
    'LBL_IMPORT_FIELDDEF_TEAM_LIST' => 'Nom ou ID Equipe',
    'LBL_IMPORT_FIELDDEF_NAME' => 'Texte',
    'LBL_IMPORT_FIELDDEF_VARCHAR' => 'Texte',
    'LBL_IMPORT_FIELDDEF_TEXT' => 'Texte',
    'LBL_IMPORT_FIELDDEF_TIME' => 'Heure',
    'LBL_IMPORT_FIELDDEF_DATE' => 'Date',
    'LBL_IMPORT_FIELDDEF_DATETIME' => 'Date et Heure',
    'LBL_IMPORT_FIELDDEF_ASSIGNED_USER_NAME' => 'Nom ou ID Utilisateur',
    'LBL_IMPORT_FIELDDEF_BOOL' => '&#39;0&#39; ou &#39;1&#39;',
    'LBL_IMPORT_FIELDDEF_ENUM' => 'Liste déroulante',
    'LBL_IMPORT_FIELDDEF_EMAIL' => 'Adresse Email',
    'LBL_IMPORT_FIELDDEF_INT' => 'Numérique (Pas Décimal)',
    'LBL_IMPORT_FIELDDEF_DOUBLE' => 'Numérique (Pas Décimal)',
    'LBL_IMPORT_FIELDDEF_NUM' => 'Numérique (Pas Décimal)',
    'LBL_IMPORT_FIELDDEF_CURRENCY' => 'Numérique (Décimal possible)',
    'LBL_IMPORT_FIELDDEF_FLOAT' => 'Numérique (Décimal possible)',
    'LBL_DATE_FORMAT' => 'Format de date :',
    'LBL_TIME_FORMAT' => 'Format de temps:',
    'LBL_TIMEZONE' => 'Fuseau horaire:',
    'LBL_ADD_ROW' => 'Ajouter un Champ',
    'LBL_REMOVE_ROW' => 'Supprimer ce Champ',
    'LBL_DEFAULT_VALUE' => 'Valeur par défaut',
    'LBL_SHOW_ADVANCED_OPTIONS' => 'Voir les options avancées',
    'LBL_HIDE_ADVANCED_OPTIONS' => 'Masquer les options avancées',
    'LBL_SHOW_NOTES' => 'Voir les Notes',
    'LBL_HIDE_NOTES' => 'Masquer les Notes',
    'LBL_SHOW_PREVIEW_COLUMNS' => 'Voir la prévisualisation des colonnes',
    'LBL_HIDE_PREVIEW_COLUMNS' => 'Masquer la prévisualisation des colonnes',
    'LBL_SAVE_MAPPING_AS' => 'Sauvegarder le mapping sous',
    'LBL_OPTION_ENCLOSURE_QUOTE' => 'Apostrophe simple (&#39;)',
    'LBL_OPTION_ENCLOSURE_DOUBLEQUOTE' => 'Guillemet double (")',
    'LBL_OPTION_ENCLOSURE_NONE' => 'Aucun',
    'LBL_OPTION_ENCLOSURE_OTHER' => 'Autre :',
    'LBL_IMPORT_COMPLETE' => 'Import terminé',
    'LBL_IMPORT_COMPLETED' => 'Import terminé',
    'LBL_IMPORT_RECORDS' => 'Import des enregistrements',
    'LBL_IMPORT_RECORDS_OF' => 'sur',
    'LBL_IMPORT_RECORDS_TO' => 'à',
    'LBL_CURRENCY' => 'Devise',
	'LBL_CURRENCY_SIG_DIGITS' => 'Nom de chiffre significatif pour les devises',
    'LBL_NUMBER_GROUPING_SEP' => 'Séparateur des milliers',
    'LBL_DECIMAL_SEP' => 'Séparateur pour les nombres décimaux',
    'LBL_LOCALE_DEFAULT_NAME_FORMAT' => 'Format d&#39;affichage du nom',
    'LBL_LOCALE_EXAMPLE_NAME_FORMAT' => 'Exemple',
    'LBL_LOCALE_NAME_FORMAT_DESC' => '<i>"s" Salutation, "f" Prénom, "l" Nom</i>',
    'LBL_CHARSET' => 'Encodage du fichier',
    'LBL_MY_SAVED_HELP' => 'Un mapping sauvegardé représente une combinaison entre une jeu de donné source et certains champs de la base de donné défini dans un import précédent.<br>Cliquer sur <b>Publier</b> pour faire un mapping disponible pour les autres utilisateurs.<br>Cliquer sur <b>De-Publier</b> pour enlever l&#39;accès à votre mapping aux autres utilisateurs.',
    'LBL_MY_SAVED_ADMIN_HELP' => 'Utiliser cette option pour appliquer vos paramètres pré-définis d&#39;import, incluant les propriétés d&#39;import, les mappings, et toute vérification de doublons, à cet import.<br><br>Cliquez <b>Publier</b> pour rendre le mapping disponible aux autres utilisateurs.<br>Cliquez <b>Dé-publier</b> pour rendre le mapping indisponible aux autres utilisateurs.<br>Cliquez <b>Supprimer</b> pour supprimer le mapping pour tous les utilisateurs.',
    'LBL_MY_PUBLISHED_HELP' => 'Un mapping publié représente une combinaison entre une jeu de donné source et certains champs de la base de donné défini dans un import précédent.',
    'LBL_ENCLOSURE_HELP' => '<p>Les <b>caractères de protection</b> sont utiliés pour encadrer les champs texte, incluant les caractères utilisés comme délimiteur.<br><br>Exemple: si le délimiteur est une virgule(,) et le caratère de protection est le guillement double ("),<br><br><b>"Cupertino, California"</b> sera importé dans un champ de l&#39;application comme <b>Cupertino, California</b>.<br>Si il n&#39;y a pas de caractère de protection ou si celui-ci est un autre caractère,<br><b>"Cupertino, California"</b> sera importé dans deux champs contenant l&#39;un <b>"Cupertino</b> et l&#39;autre <b>California"</b>.<br><br>Pour information : Le fichier à import peut ne pas contenir de caractère de protection.<br>Le caractère de protection par défaut pour un fichier créé par Excel et dont le délimiteur est la virgule ou la tabulaion est le guillement double.</p>',
    'LBL_DELIMITER_COMMA_HELP' => 'Sélectionnez cette option si le séparateur de champs du fichier à importer est la <b>virgule</b>.',
    'LBL_DELIMITER_TAB_HELP' => 'Sélectionnez cette option si le séparateur de champs du fichier à importer est la <b>tabulation</b>.',
    'LBL_DELIMITER_CUSTOM_HELP' => 'Sélectionnez cette option si le séparateur de champs du fichier à importer est ni une virgule et ni une tabulation.',
    'LBL_DATABASE_FIELD_HELP' => 'Sélectionnez un champs parmi les champs existants (et importables) de ce module.',
    'LBL_HEADER_ROW_HELP' => 'Libellés des champs de la ligne d&#39;en-tête du fichier à importer.',
    'LBL_DEFAULT_VALUE_HELP' => 'Indiquez une valeur à utiliser dans le champs lors de la création ou de la mise à jour de l&#39;enregistrement si le champs dans le fichier d&#39;import ne contient pas de donnée.',
    'LBL_ROW_HELP' => 'Données de la permière ligne après la ligne d&#39;en-têtes.',
    'LBL_SAVE_MAPPING_HELP' => 'Saisissez une valeur pour nommer le groupe de champs de la base de données utilisé dans le mapping avec les champs présent dans le fichier d&#39;import.<br>Le groupe de champs, incluant l&#39;ordre des champs ainsi que les données source sélectionnées dans l&#39;étape d&#39;import 1, sera sauvé à la fin de la procédure d&#39;import.<br>Ce mapping ainsi sauvegardée pourra être ainsi utilisé dans l&#39;étape 1 pour d&#39;autres imports.',
    'LBL_IMPORT_FILE_SETTINGS_HELP' => 'Lors de la transmission de votre fichier, certaines propriétés ont été automatiquement détectées. Visualisez et gérez ces propriétés selon ce qui vous paraît approprié. Remarque : Les paramètres spécifiés ici sont valables uniquement pour l&#39;import en cours et ne mettront pas à jour vos paramètres d&#39;utilisateur.',
    'LBL_VERIFY_DUPLCATES_HELP' => 'Sélectionnez les champs à utiliser dans le fichier d&#39;import pour la phase de vérification des doublons.<br> Si les données des champs sélectionnés correspondent avce des enregistrements existant , les enregistrements correspondant ne seront pas créés dans la base de donnée.<br>Les lignes contenant des données de doublons seront identifiées dans le Résultat d&#39;import.',
    'LBL_IMPORT_STARTED' => 'Début de l&#39;import à',
    'LBL_IMPORT_FILE_SETTINGS' => 'Paramètres du fichier d&#39;import',
    'LBL_RECORD_CANNOT_BE_UPDATED' => 'Vous ne pouvez pas mettre à jour cet enregistrement',
    'LBL_DELETE_MAP_CONFIRMATION' => 'Etes-vous sûr de vouloir supprimer ce mapping ?',
    'LBL_THIRD_PARTY_CSV_SOURCES' => 'Si le fichier d&#39;import a été exporté depuis une de ces sources veuillez la sélectionner.',
    'LBL_THIRD_PARTY_CSV_SOURCES_HELP' => 'Sélectionner la source afin d&#39;appliquer automatiquement des mappings personnalisés qui simplifieront le process de mapping (étape suivante).',
    'LBL_EXTERNAL_SOURCE_HELP' => 'Utiliser cette option pour importer des données directement depuis une application externe ou service, comme Gmail.',
    'LBL_EXAMPLE_FILE' => 'Télécharger le modèle de fichier d&#39;import',
    'LBL_CONFIRM_IMPORT' => 'Vous avez sélectionné la mise à jour des données durant le process d import. Les mises à jour faites sur des enregistrements existants ne pourront pas être annulées. Cependant, les enregistrements créés durant ce process d import pourront être annulés (effacés), si vous le souhaitez. Cliquez Annuler si vous souhaitez seulement créer de nouveaux enregistrements ou cliquez sur OK pour continuer.',
    'LBL_CONFIRM_MAP_OVERRIDE' => 'Attention: Vous avez déjà sélectionné un mapping personnalisé pour cet import, voulez vous continuer ?',
    'LBL_EXTERNAL_FIELD' => 'Champ externe',
    'LBL_SAMPLE_URL_HELP' => 'Télécharger un exemple de fichier d&#39;import contenant une ligne d&#39;entête des champs du module. Ce fichier peut être utilisé comme modèle pour créer votre fichier d&#39;import contenant les données que vous souhaitez importer.',
    'LBL_AUTO_DETECT_ERROR' => 'Le délimiteur de champ n&#39;a pas pu être détecté dans le fichier à importer. Veuillez vérifier les paramètres dans les propriétés d&#39;import.',
    'LBL_MIME_TYPE_ERROR_1' => 'Le fichier transmis ne semble pas contenir un délimiteur de champ. Veuillez vérifier le type du fichier. Nous recommandons un fichier type CSV délimité par des points-virgules ou virgules.',
    'LBL_MIME_TYPE_ERROR_2' => 'Pour continuer à importer le fichier transmis, cliquer sur OK. Pour transmettre un nouveau fichier, cliquer sur Ré-essayer',
    'LBL_FIELD_DELIMETED_HELP' => 'Le délimiteur de champ est le caractère utilisé pour séparer les colonnes.',
    'LBL_FILE_UPLOAD_WIDGET_HELP' => 'Transmettez un fichier contenant des données séparées par un délimiteur, comme des fichiers délimités type CSV séparés par des points-virgules, des virgules ou des tabulations.',
    'LBL_EXTERNAL_ERROR_NO_SOURCE' => 'Impossible de récupérer la source, veuillez réessayer ultérieurement.',
    'LBL_EXTERNAL_ERROR_FEED_CORRUPTED' => 'Impossible de récupérer le flux externe, veuillez réessayer ultérieurement.',
    'LBL_ERROR_IMPORT_CACHE_NOT_WRITABLE' => 'Le répertoire de stockage temporaire des fichiers pour l&#39;import n&#39;est pas accéssible en écriture.',
    'LBL_ADD_FIELD_HELP' => 'Utiliser cette option pour définir une valeur pour tous les enregistrements créés ou mis à jour. Choisir le champ puis saisir ou sélectionner une valeur dans la colonne valeur par défaut.',
    'LBL_MISSING_HEADER_ROW' => 'Aucune ligne d&#39;entête trouvée',
    'LBL_CANCEL' => 'Annuler',
    'LBL_SELECT_DS_INSTRUCTION' => 'Prêt à importer ? Choisissez la source de données que vous voulez importer.',
    'LBL_SELECT_UPLOAD_INSTRUCTION' => 'Choisissez un fichier sur votre ordinateur qui contient les données que vous souhaitez importer, ou téléchargez le modèle pour avoir un bon départ dans la création de votre fichier à importer.',
    'LBL_SELECT_PROPERTY_INSTRUCTION' => 'Voici comment les premières lignes apparaissent avec les propriétés de fichier auto détectées. Si une ligne d entête a été détectée, elle est affichée en première ligne du tableau. Regardez les propriétés d import de fichier pour réaliser des modifications sur les propriétés auto-détectées et enregistrer d autres propriétés. Mettre à jour les propriétés mettra à jour les données qui apparaissent dans le tableau.',
    'LBL_SELECT_MAPPING_INSTRUCTION' => 'Le tableau ci-dessous contient tous les champs du module qui peuvent être mappés avec les données du fichier importé. Si le fichier contient une ligne d entête, les colonnes dans le fichier ont été automatiquement mappées avec les champs correspondant. Vérifiez les mappings pour être sûr qu ils sont ce à quoi vous vous attendez, et réalisez les modifications si nécessaire. Pour vous aider dans cette tâche Ligne1 affiche les données du fichier. Faites bien attention à mapper tous les champs obligatoire (identifiés par un astérisque).',
    'LBL_SELECT_DUPLICATE_INSTRUCTION' => 'Pour éviter de créer des doublons, sélectionnez un des champs du mapping pour réaliser le dédoublonnage lors de l import des données. Les valeurs existantes pour les champs sélectionnés seront confrontées aux données du fichier importé. Si des correspondances sont trouvées, les lignes du fichier d import contenant les données en cause seront affichées avec les résultats de l import (page suivante). Vous pourrez alors choisir quelles lignes vous souhaitez tout de même importer.',
    'LBL_EXT_SOURCE_SIGN_IN' => 'Identifiez-vous',
    'LBL_EXT_SOURCE_SIGN_OUT' => 'Se déconnecter',
    'LBL_DUP_HELP' => 'Voici les lignes du fichier importé qui n&#39;ont pas été importées parce qu&#39;elles contiennent des enregistrements qui correspondent à des données existantes dans votre SuiteCRM au regard de la vérification de doublons. Les données qui correspondantes ont été mises en avant. Pour réimporter ces lignes, téléchargez le fichier, réalisez les changements nécessaires et cliquez sur <b>Nouvel Import</b>.',
    'LBL_DESELECT' => 'dé-sélectionner',
    'LBL_SUMMARY' => 'Résumé',
    'LBL_OK' => 'Ok',
    'LBL_ERROR_HELP' => 'Voici les lignes du fichier importé qui n&#39;ont pas été importées pour cause d&#39;erreurs. Pour réimporter ces lignes, téléchargez le fichier, réalisez les changements nécessaires et cliquez sur <b>Nouvel Import</b>',
    'LBL_EXTERNAL_MAP_HELP' => 'Le tableau ci-dessous contient les champs de la source externe et les champs de module pour lesquels ils sont mappés.<br />Vérifiez les mappings pour être sûr qu&#39;ils sont ce à quoi vous vous attendez, et réalisez les modifications si nécessaire. Faites bien attention à mapper tous les champs obligatoire (identifiés par un asterisque).',
    'LBL_EXTERNAL_MAP_NOTE' => 'L&#39;import va être réalisé pour les contacts dans tous les groupes de Contacts de Google.',
    'LBL_EXTERNAL_MAP_NOTE_SUB' => 'Les noms des nouveaux utilisateurs créés seront les noms complets des contacts Google par défaut. Les noms peuvent être changés après la création des enregistrements.',
    'LBL_EXTERNAL_MAP_SUB_HELP' => 'Cliquer <b>Importer Maintenant</b> pour lancer l&#39;import. Les enregistrements seront seulement créés pour les données qui contiennent un nom de famille. Les enregistrements ne seront pas créés pour les données identifiées comme doublons à partir des noms et/ou adresses email correspondant à des enregistrements existants.',
    'LBL_EXTERNAL_FIELD_TOOLTIP' => 'Cette colonne affiche les champs de la source externe qui contiennent des données qui vont être utilisées pour créer de nouveaux enregistrements.',
    'LBL_EXTERNAL_DEFAULT_TOOPLTIP' => 'Indique une valeur à utiliser pour le champ dans l&#39;enregistrement créé, si le champ dans la source externe ne contient aucune donnée.',
    'LBL_EXTERNAL_ASSIGNED_TOOLTIP' => 'Pour assigner les nouveaux enregistrement à un utilisateur différent de vous même, utilisez la colonne valeur par défaut pour sélectionner un autre utilisateur',
    'LBL_EXTERNAL_TEAM_TOOLTIP' => 'Pour assigner les enregistrements à des équipes autres que votre(vos) équipe(s) par défaut, utilisez la colonne valeur par défaut pour définir d&#39;autre(s) équipe(s).',
    'LBL_SIGN_IN_HELP' => 'Pour activer ce service, veuillez vous identifier sur l&#39;onglet "Comptes Externes" dans la section appropriée sur vos paramètres utilisateur.'
);

global $timedate;
?>
