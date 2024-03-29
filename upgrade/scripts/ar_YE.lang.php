<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2019 SalesAgility Ltd.
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
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
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
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$mod_strings = array(
    'DEFAULT_CHARSET' => 'UTF-8',
    'LBL_DISABLED_TITLE' => 'تثبيت النظام غير مفعل',
    'LBL_DISABLED_TITLE_2' => 'لقد تم تعطيل تثبيت النظام',
    'LBL_DISABLED_DESCRIPTION' => 'لقد تم تشغيل التثبيت مرةً من قبل. كإجراء وقائي، تم منع تُشغيل التثبيت مرة أخرى. إذا كنت متأكدا من رغبتك في تشغيل التثبيت مرةً أخرى، فيرجى الذهاب لملف config.php وتحديد أو إضافة متغير باسم \'installer_locked\' ثم أعطه قيمة \'false\'. سيكون شكل الأمر مكتوبا ًكالتالي:',
    'LBL_DISABLED_DESCRIPTION_2' => 'بعد أن يتم إجراء هذا التغيير، يمكنك النقر على زر "ابدأ" بالأسفل لبدء عملية التثبيت الخاصة بك.  <i>بعد أن يكتمل التثبيت، ستحتاج لتغيير قيمة المتغير \'installer_locked\' إلى \'true\'.</i>',
    'LBL_DISABLED_HELP_1' => 'للحصول على مساعدة في التثبيت، الرجاء زيارة SuiteCRM',
    'LBL_DISABLED_HELP_2' => 'مُنتدى الدعم',

    'LBL_REG_TITLE' => 'التسجيل',
    'LBL_REG_CONF_1' => 'توقف لحظة للتسجيل مع SuiteCRM. من خلال سماحك لنا بالتعرف قليلاً على كيف تخطط منشأتك لاستخدام SuiteCRM، فإن ذلك سيمكننا أن نضمن لك تسليم منتج مناسب لاحتياجات عملك دائماً.',
    'LBL_REG_CONF_2' => 'الحقول الخاصة باسمك وعنوان بريدك الإلكتروني هي الإلزامية فقط. الحقول الأخرى اختيارية ولكنها مفيدة. نحن لن نقوم ببيع أو تأجير أو مُشاركة أو توزيع بياناتك إلى طرف آخر.',
    'LBL_REG_CONF_3' => 'شكراً لتسجيلك، أنقر على زر إنهاء حتى تدخل على SuiteCRM. ستحتاج إلى الدخول في المرة الأولى باستخدام اسم المُستخدم "admin" وكلمة المرور حتى تُكمل الخطوة الثانية.',


    'ERR_ADMIN_PASS_BLANK' => 'لايُسمح بترك كلمة مرور مدير النظام فارغة.',
    'ERR_CHECKSYS_CALL_TIME' => 'خاصية السماح بتمرير المعطيات بالمرجع خلال تنفيذ الدوال (allow_ call_ time_ pass_ reference) معطلة (يرجى تفعيلها في ملف php.ini)',
    'ERR_CHECKSYS_CURL' => 'غير موجود: أداة الجدولة (Scheduler) في نظام SuiteCRM ستعمل بوظائف محدودة.',
    'ERR_CHECKSYS_MEM_LIMIT_1' => 'تحذير: $memory_limit (قم بضبطها على ',
    'ERR_CHECKSYS_MEM_LIMIT_2' => 'ميغا أو أكثر في ملف php.ini)',
    'ERR_CHECKSYS_NO_SESSIONS' => 'فشل في كتابة وقراءة متغيرات الجلسة (session). لن نتمكن من متابعة تثبيت النظام.',
    'ERR_CHECKSYS_NOT_VALID_DIR' => 'مُجلد غير صحيح',
    'ERR_CHECKSYS_NOT_WRITABLE' => 'تحذير: غير قابل للكتابة',
    'ERR_CHECKSYS_PHP_INVALID_VER' => 'إصدار PHP المُثبت غير صالح: (إصدار',
    'ERR_CHECKSYS_PHP_UNSUPPORTED' => 'إصدار PHP المُثبت غير مدعوم: (رقم الإصدار',
    'ERR_CHECKSYS_SAFE_MODE' => 'طور الآمان (Safe Mode) مفعل (يرجى تعطيله من خلال ملف php.ini)',
    'ERR_DB_ADMIN' => 'اسم المُستخدم لمدير قاعدة البيانات و/أو كلمة المرور خاطئة (خطأ ',
    'ERR_DB_EXISTS_NOT' => 'قاعدة البيانات المحددة غير موجودة.',
    'ERR_DB_EXISTS_WITH_CONFIG' => 'قاعدة البيانات موجودة مسبقاً وفيها بيانات التهيئة.  لبدء التثبيت باستخدام قاعدة البيانات التي اخترتها، يرجى إعادة تشغيل عملية التثبيت واختيار: "حذف وإعادة إنشاء جداول SuiteCRM الموجودة؟" أو بالإنجليزية "?Drop and recreate existing SuiteCRM tables" أما لترقية الإصدار استخدم "المرشد الآلي للترقية Upgrade Wizard" في وحدة تحكم المشرفين والمُدراء للنظام.  يُرجى قراءة وثائق الترقية الموجودة <a href="https://docs.suitecrm.com/admin/installation-guide/upgrading/" target="_new">هنا</a>.',
    'ERR_DB_EXISTS' => 'اسم قاعدة البيانات موجود مُسبقاً - لا يمكن إنشاء قاعدة بيانات أخرى بنفس الاسم.',
    'ERR_DB_HOSTNAME' => 'لا يُمكنك أن تترك اسم المُستضيف (Hostname) فارغاً.',
    'ERR_DB_INVALID' => 'لقد اخترت نوع قاعدة بيانات خاطئ.',
    'ERR_DB_LOGIN_FAILURE_MYSQL' => 'اسم مُستخدم قاعدة البيانات و/أو كلمة المرور خاطئة (خطأ ',
    'ERR_DB_MYSQL_VERSION1' => 'إصدار MySQL ',
    'ERR_DB_MYSQL_VERSION2' => ' غير معتمد. ندعم فقط MySQL 4.1.x أو أعلى.',
    'ERR_DB_NAME' => 'لا يُمكنك أن تترك اسم قاعدة البيانات فارغاً.',
    'ERR_DB_NAME2' => "لا يُسمح بأن يحتوي اسم قاعدة البيانات على أحد هذه الرموز '\\', '/', '.'",
    'ERR_DB_PASSWORD' => 'كلمات المرور الخاصة بالنظام لا تتطابق.',
    'ERR_DB_PRIV_USER' => 'اسم المستخدم لمدير قاعدة البيانات إلزامي.',
    'ERR_DB_USER_EXISTS' => 'اسم المستخدم للنظام موجود مُسبقاً--لا يمكنك إنشاء اسم آخر مماثل للموجود.',
    'ERR_DB_USER' => 'لا يمكن أن يكون اسم المستخدم للنظام فارغ.',
    'ERR_DBCONF_VALIDATION' => 'يرجى إصلاح الأخطاء التالية قبل متابعة:',
    'ERR_ERROR_GENERAL' => 'لقد وجدت الأخطاء التالية:',
    'ERR_LICENSE_MISSING' => 'هناك حقول إلزامية لم يتم إدخال بياناتها',
    'ERR_LICENSE_NOT_FOUND' => 'لم يتم العثور على ملف الترخيص!',
    'ERR_LOG_DIRECTORY_NOT_EXISTS' => 'مجلد سجل عمليات النظام الذي زودتنا به غير صحيح.',
    'ERR_LOG_DIRECTORY_NOT_WRITABLE' => 'مجلد سجل عمليات النظام الذي زودتنا به غير قابل للكتابة.',
    'ERR_LOG_DIRECTORY_REQUIRED' => 'مُجلد سجل عمليات النظام إلزامي إذا كنت ترغب في تحديد المجلد الخاص بك.',
    'ERR_NO_DIRECT_SCRIPT' => 'غير قادر على معالجة الشفرة البرمجية بشكل مباشر.',
    'ERR_PASSWORD_MISMATCH' => 'كلمات مرور مدير النظام غير متطابقة.',
    'ERR_PERFORM_CONFIG_PHP_1' => 'لا يمكن الكتابة في ملف <span class=stop> config.php</span>.',
    'ERR_PERFORM_CONFIG_PHP_2' => 'يمكنك متابعة عملية التثبيت هذه من خلال إنشاء ملف config.php بشكل يدوي ولصق معلومات التهيئة الموجودة أدناه في ملف config.php.  ومع ذلك، <strong>يجب</strong> عليك إنشاء ملف config.php قبل أن تتابع إلى الخطوة التالية.',
    'ERR_PERFORM_CONFIG_PHP_3' => 'هل قمت بإنشاء ملف config.php؟',
    'ERR_PERFORM_CONFIG_PHP_4' => 'تحذير: تعذر الكتابة في ملف config.php.  الرجاء التأكد من أن الملف موجود.',
    'ERR_PERFORM_HTACCESS_1' => 'لا يمكن الكتابة في الملف ',
    'ERR_PERFORM_HTACCESS_2' => ' .',
    'ERR_PERFORM_HTACCESS_3' => 'إذا كنت ترغب في المحافظة على أمن ملف سجل عمليات النظام الخاص بك بحيث لا يتم الوصول إليه عبر متصفح الانترنت، فيجب أن تنشئ ملف.htaccess في مجلد السجل الخاص بك يحتوي على السطر التالي:',
    'ERR_PERFORM_NO_TCPIP' => '<b>لم يتم الوصول إلى خدمة الإنترنت.</b> عندما يتوفر لديك اتصال بالإنترنت فيرجى زيارة <a href=\\"https://www.suitecrm.com\\"> https://www.suitecrm.com/</a> للتسجيل كعضو في SuiteCRM. دعنا نتعرف قليلاً على الكيفية التي تخطط بها شركتك استعمال نظام SuiteCRM، هذا سيسمح لنا ضمان تطويرنا للتطبيق المناسب لاحتياجات عملك.',
    'ERR_SESSION_DIRECTORY_NOT_EXISTS' => 'إن مجلد الجلسات (Session directory) الذي زودتنا غير صحيح.',
    'ERR_SESSION_DIRECTORY' => 'إن مجلد الجلسات (Session directory) الذي زودتنا به غير قابل للكتابة.',
    'ERR_SESSION_PATH' => 'مسار الجلسات (Session path) إلزامي إذا كنت تريد تحديد المسار الخاص بك.',
    'ERR_SI_NO_CONFIG' => 'لم تقم بتضمين ملف config_si.php في المُجلد الأساسي (document root)، أو أنك لم تحدد $sugar_config_si في ملف config.php',
    'ERR_SITE_GUID' => 'معرف التطبيق مطلوب إذا كنت تريد تحديد مُعرف خاص بك.',
    'ERR_URL_BLANK' => 'لا يُمكنك أن تترك عنوان الرابط (URL) فارغاً.',
    'LBL_BACK' => 'رجوع',
    'LBL_CHECKSYS_1' => 'لكي يعمل تثبيت SuiteCRM بشكل صحيح، يرجى التأكد من أن جميع عناصر فحص النظام المدرجة أدناه باللون الأخضر. إذا كان لون أي منها باللون الأحمر، فيرجى اتخاذ الخطوات اللازمة لإصلاحها.',
    'LBL_CHECKSYS_CACHE' => 'ذاكرة التخزين المؤقتة (Cache) الخاصة بالمجلد الفرعي قابلة للكتابة',
    'LBL_CHECKSYS_CALL_TIME' => 'خاصية PHP بالسماح بتمرير المعطيات بواسطة المرجع خلال تنفيذ الدوال (allow_ call_ time_ pass_ reference) مفعلة',
    'LBL_CHECKSYS_COMPONENT' => 'مكون',
    'LBL_CHECKSYS_CONFIG' => 'ملف (config.php) الخاص بتهيئة وإعدادات SuiteCRM قابل للكتابة عليه',
    'LBL_CHECKSYS_CURL' => 'مكتبة cURL',
    'LBL_CHECKSYS_CUSTOM' => 'مجلد مخصص قابل للكتابة عليه',
    'LBL_CHECKSYS_DATA' => 'مجلد فرعي للبيانات قابل للكتابة عليه',
    'LBL_CHECKSYS_MEM_OK' => 'موافق (بدون حدود)',
    'LBL_CHECKSYS_MEM_UNLIMITED' => 'حسنا (غير محدود)',
    'LBL_CHECKSYS_MEM' => 'الحد الأقصى لذاكرة PHP > = ',
    'LBL_CHECKSYS_MODULE' => 'الملفات والمجلدات الفرعية للوحدات قابلة للكتابة',
    'LBL_CHECKSYS_NOT_AVAILABLE' => 'غير مُتاح',
    'LBL_CHECKSYS_OK' => 'موافق',
    'LBL_CHECKSYS_PHP_INI' => '<b>ملاحظة:</b> ملف الإعدادات (php.ini) يقع في:',
    'LBL_CHECKSYS_PHP_OK' => 'حسنا (إصدار ',
    'LBL_CHECKSYS_PHPVER' => 'إصدار PHP',
    'LBL_CHECKSYS_RECHECK' => 'إعادة فحص',
    'LBL_CHECKSYS_SAFE_MODE' => 'إن طور الآمان PHP Safe Mode معطل',
    'LBL_CHECKSYS_SESSION' => 'مسار حفظ الجلسات قابل للكتابة (',
    'LBL_CHECKSYS_STATUS' => 'الحالة',
    'LBL_CHECKSYS_TITLE' => 'قبول نظام الفحص والاختبار',
    'LBL_CHECKSYS_XML' => 'تحليل XML',
    'LBL_CLOSE' => 'إغلاق',
    'LBL_CONFIRM_BE_CREATED' => 'سيتم إنشاؤه',
    'LBL_CONFIRM_DB_TYPE' => 'نوع قاعدة البيانات',
    'LBL_CONFIRM_DIRECTIONS' => 'يُرجى تأكيد الإعدادات أدناه. إذا رغبت في تغيير أي من القيم، انقر على "السابق" لبدء التحرير.  أو انقر على "التالي" لبدء التثبيت.',
    'LBL_CONFIRM_LICENSE_TITLE' => 'معلومات الترخيص',
    'LBL_CONFIRM_NOT' => 'ليس',
    'LBL_CONFIRM_TITLE' => 'تأكيد الإعدادات',
    'LBL_CONFIRM_WILL' => 'سوف',
    'LBL_DBCONF_CREATE_DB' => 'إنشاء قاعدة البيانات',
    'LBL_DBCONF_CREATE_USER' => 'إنشاء المستخدم',
    'LBL_DBCONF_DB_DROP_CREATE_WARN' => 'تنبيه: جميع بيانات النظام سيتم مسحها<br>وذلك إذا تحديد هذا الاختيار.',
    'LBL_DBCONF_DB_DROP_CREATE' => 'حذف وإعادة إنشاء جداول SuiteCRM الموجودة؟',
    'LBL_DBCONF_DB_NAME' => 'اسم قاعدة البيانات',
    'LBL_DBCONF_DB_PASSWORD' => 'كلمة مرور لقاعدة البيانات',
    'LBL_DBCONF_DB_PASSWORD2' => 'إعادة إدخال كلمة مرور قاعدة البيانات',
    'LBL_DBCONF_DB_USER' => 'اسم مستخدم قاعدة البيانات',
    'LBL_DBCONF_DEMO_DATA' => 'تعبئة قاعدة البيانات ببيانات تجريبية؟',
    'LBL_DBCONF_HOST_NAME' => 'اسم المضيف',
    'LBL_DBCONF_INSTRUCTIONS' => 'الرجاء إدخال المعلومات الخاصة بتهيئة قاعدة بياناتك أدناه. إذا كنت لا تعرف البيانات المطلوبة فنقترح عليك استخدام الإعدادات الافتراضية.',
    'LBL_DBCONF_MB_DEMO_DATA' => 'استخدام نص متعدد البايت (multi-byte) في البيانات التجريبية؟',
    'LBL_DBCONF_PRIV_PASS' => 'كلمة مرور مستخدم قاعدة البيانات صاحب الصلاحية',
    'LBL_DBCONF_PRIV_USER_2' => 'هل مستخدم قاعدة البيانات أعلاه يملك كامل الصلاحيات؟?',
    'LBL_DBCONF_PRIV_USER_DIRECTIONS' => 'يجب أن يكون لدى مستخدم قاعدة البيانات هذا الصلاحيات المناسبة لإنشاء قاعدة بيانات، وحذف/إنشاء الجداول، وإنشاء المستخدمين. سيتم استخدام حساب مستخدم قاعدة البيانات هذا فقط لأداء هذه المهام حسب الحاجة أثناء عملية التثبيت. يمكنك أيضًا استخدام نفس حساب مستخدم قاعدة البيانات على النحو الوارد أعلاه إذا كان هذا المستخدم لديه صلاحيات كافية.',
    'LBL_DBCONF_PRIV_USER' => 'اسم مستخدم قاعدة البيانات صاحب الصلاحية',
    'LBL_DBCONF_TITLE' => 'إعدادات قاعدة البيانات',
    'LBL_HELP' => 'مساعدة',
    'LBL_LICENSE_ACCEPTANCE' => 'قبول الترخيص',
    'LBL_LICENSE_DIRECTIONS' => 'إذا كانت لديك معلومات الترخيص الخاصة بك، فيرجى إدخالها في الحقول أدناه.',
    'LBL_LICENSE_DOWNLOAD_KEY' => 'مفتاح التنزيل',
    'LBL_LICENSE_EXPIRY' => 'تاريخ الإنتهاء',
    'LBL_LICENSE_I_ACCEPT' => 'موافق',
    'LBL_LICENSE_NUM_USERS' => 'عدد المستخدمين',
    'LBL_LICENSE_OC_DIRECTIONS' => 'الرجاء إدخال عدد النقاط غير المتصلة المشتراة.',
    'LBL_LICENSE_OC_NUM' => 'عدد النقاط غير المتصلة',
    'LBL_LICENSE_OC' => 'النقاط غير المتصلة',
    'LBL_LICENSE_PRINTABLE' => ' عرض الطباعة ',
    'LBL_LICENSE_TITLE' => 'معلومات الترخيص',
    'LBL_LICENSE_TITLE_2' => 'ترخيص SuiteCRM',
    'LBL_LICENSE_USERS' => 'المتخدمون المرخصون',
    'LBL_MYSQL' => 'MySQL',
    'LBL_NEXT' => 'التالي',
    'LBL_NO' => 'لا',
    'LBL_ORACLE' => 'أوراكل',
    'LBL_PERFORM_ADMIN_PASSWORD' => 'تعيين كلمة مرور مدير الموقع',
    'LBL_PERFORM_AUDIT_TABLE' => 'جدول التدقيق / ',
    'LBL_PERFORM_CONFIG_PHP' => 'إنشاء ملف تهيئة SuiteCRM',
    'LBL_PERFORM_CREATE_DB_1' => 'إنشاء قاعدة البيانات ',
    'LBL_PERFORM_CREATE_DB_2' => ' على ',
    'LBL_PERFORM_CREATE_DB_USER' => 'إنشاء اسم مستخدم وكلمة مرور لقاعدة البيانات...',
    'LBL_PERFORM_CREATE_DEFAULT' => 'إنشئ البيانات الافتراضية للنظام',
    'LBL_PERFORM_CREATE_LOCALHOST' => 'إنشاء اسم المستخدم وكلمة المرور لقاعدة البيانات في localhost',
    'LBL_PERFORM_CREATE_RELATIONSHIPS' => 'أنشئ علاقات جداول النظام',
    'LBL_PERFORM_CREATING' => 'إنشاء / ',
    'LBL_PERFORM_DEFAULT_REPORTS' => 'إنشاء التقارير الافتراضية',
    'LBL_PERFORM_DEFAULT_SCHEDULER' => 'إنشاء جدولة افتراضية للمهام',
    'LBL_PERFORM_DEFAULT_SETTINGS' => 'أضف الإعدادات الافتراضية',
    'LBL_PERFORM_DEFAULT_USERS' => 'إنشاء المستخدمين الافتراضيين',
    'LBL_PERFORM_DEMO_DATA' => 'ملء جداول قاعدة البيانات ببيانات تجريبية (يستغرق وقتاً)...',
    'LBL_PERFORM_DONE' => 'تم <br>',
    'LBL_PERFORM_DROPPING' => 'حذف / ',
    'LBL_PERFORM_FINISH' => 'إنتهى',
    'LBL_PERFORM_LICENSE_SETTINGS' => 'تحديث معلومات الترخيص',
    'LBL_PERFORM_OUTRO_1' => 'إعداد نظام SuiteCRM ',
    'LBL_PERFORM_OUTRO_2' => ' اكتمل الآن.',
    'LBL_PERFORM_OUTRO_3' => 'إجمالي الوقت: ',
    'LBL_PERFORM_OUTRO_4' => ' ثواني.',
    'LBL_PERFORM_OUTRO_5' => 'الذاكرة المستخدمة التقريبية: ',
    'LBL_PERFORM_OUTRO_6' => ' بايت.',
    'LBL_PERFORM_OUTRO_7' => 'النظام الخاص بك مثبت وتم تهيئته للاستخدام.',
    'LBL_PERFORM_REL_META' => 'البيانات الوصفية للعلاقات ... ',
    'LBL_PERFORM_SUCCESS' => 'ناجح!',
    'LBL_PERFORM_TABLES' => 'إنشاء جداول نظام SuiteCRM وجداول المراجعة والتدقيق والعلاقات...',
    'LBL_PERFORM_TITLE' => 'تنفيذ التهيئة',
    'LBL_PRINT' => 'طباعة',
    'LBL_REQUIRED' => '* حقل إلزامي',
    'LBL_SITECFG_ADMIN_PASS_2' => 'إعادة إدخال كلمة مرور <em>مدير</em> النظام',
    'LBL_SITECFG_ADMIN_PASS_WARN' => 'تنبيه: سيتم تعديل كلمة مرور مدير النظام الخاصة بالتثبيت السابق.',
    'LBL_SITECFG_ADMIN_PASS' => 'كلمة مرور <em>مدير</em> النظام',
    'LBL_SITECFG_APP_ID' => 'معرف التطبيق',
    'LBL_SITECFG_CUSTOM_ID_DIRECTIONS' => 'تجاوز معرف التطبيق الذي تم إنشاؤه تلقائيًا والذي يمنع استخدام الجلسات من نسخة واحدة من SuiteCRM في نسخة أخرى. إذا كان لديك مجموعة من تثبيتات SuiteCRM، فيجب أن تشرك جميعًها في نفس معرف التطبيق.',
    'LBL_SITECFG_CUSTOM_ID' => 'توفير معرف التطبيق الخاص بك',
    'LBL_SITECFG_CUSTOM_LOG_DIRECTIONS' => 'تجاوز المسار الافتراضي حيث يوجد سجل عمليات SuiteCRM. بغض النظر عن مكان وجود ملف السجل، سيتم تقييد الوصول إليه عبر المتصفح عبر إعادة توجيه في ملف .htaccess.',
    'LBL_SITECFG_CUSTOM_LOG' => 'استخدم مسار مخصص لسجل عمليات النظام (log)',
    'LBL_SITECFG_CUSTOM_SESSION_DIRECTIONS' => 'قم بتوفير مجلد آمن لتخزين معلومات جلسات SuiteCRM لمنع تعرض بيانات الجلسات للخطر على الخوادم المشتركة.',
    'LBL_SITECFG_CUSTOM_SESSION' => 'استخدم مجلد جلسات مخصص لنظام SuiteCRM',
    'LBL_SITECFG_DIRECTIONS' => 'الرجاء إدخال معلومات تهيئة الموقع أدناه. إذا كنت لا تعرف البيانات المطلوبة فنقترح عليك استخدام الإعدادات الافتراضية.',
    'LBL_SITECFG_FIX_ERRORS' => 'يرجى إصلاح الأخطاء التالية قبل متابعة:',
    'LBL_SITECFG_LOG_DIR' => 'مجلد سجل عمليات النظام',
    'LBL_SITECFG_SESSION_PATH' => 'مسار مجلد الجلسات<br>(يجب أن يكون قابل للكتابة)',
    'LBL_SITECFG_SITE_SECURITY' => 'أمان الموقع المتقدم',
    'LBL_SITECFG_SUGAR_UP_DIRECTIONS' => 'عند تفعيل هذا الخيار، سيرسل نظامك بشكل دوري إحصائيات مجهولة إلى SuiteCRM Inc. حول التثبيت الخاص بك والتي ستساعدنا في فهم أنماط الاستخدام وتحسين المنتج. في مقابل هذه المعلومات، سيتلقى مدراء النظام إشعارات بالتحديث عند توفر إصدارات أو تحديثات جديدة.',
    'LBL_SITECFG_SUGAR_UP' => 'تفعيل ميزة الإعلام عن تحديثات النظام؟',
    'LBL_SITECFG_SUGAR_UPDATES' => 'إعدادات إتحديث SuiteCRM',
    'LBL_SITECFG_TITLE' => 'إعدادات الموقع',
    'LBL_SITECFG_URL' => 'رابط URl لنسخة SuiteCRM',
    'LBL_SITECFG_USE_DEFAULTS' => 'استخدم الإعدادات الافتراضية؟',
    'LBL_START' => 'ابدأ',
    'LBL_STEP' => 'الخطوة',
    'LBL_TITLE_WELCOME' => 'مرحبا بك في نظام SuiteCRM ',
    'LBL_WELCOME_1' => 'ينشئ برنامج التثبيت هذا جداول قاعدة بيانات SuiteCRM ويعين متغيرات التهيئة التي تحتاجها للبدء. ينبغي أن تستغرق العملية بأكملها حوالي عشر دقائق.',
    'LBL_WELCOME_2' => 'للحصول على تعليمات التثبيت ، يرجى زيارة SuiteCRM <a href="https://suitecrm.com/suitecrm/forum/suite-forum" target="_blank"> منتديات الدعم </a>.',
    'LBL_WELCOME_CHOOSE_LANGUAGE' => 'اختر اللغة الخاصة بك',
    'LBL_WELCOME_SETUP_WIZARD' => 'مرشد الإعدادات الآلي',
    'LBL_WELCOME_TITLE_WELCOME' => 'مرحبا بك في نظام SuiteCRM ',
    'LBL_WELCOME_TITLE' => 'المرشد الآلي لتثبيت نظام SuiteCRM',
    'LBL_WIZARD_TITLE' => 'المرشد الآلي لتثبيت نظام SuiteCRM: خطوة ',
    'LBL_YES' => 'نعم',
);
