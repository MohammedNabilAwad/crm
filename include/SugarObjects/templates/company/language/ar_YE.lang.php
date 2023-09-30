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
    'ERR_DELETE_RECORD' => 'يجب تحديد رقم السجل ليتم حذف الحساب.',
    'LBL_ACCOUNT_NAME' => 'اسم الشركة:',
    'LBL_ACCOUNT' => 'شركة:',
    'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'الأنشطة',
    'LBL_ADDRESS_INFORMATION' => 'معلومات العنوان',
    'LBL_ANNUAL_REVENUE' => 'الإيرادات السنوية:',
    'LBL_ANY_ADDRESS' => 'أي عنوان:',
    'LBL_ANY_EMAIL' => 'أي بريد إلكتروني:',
    'LBL_EMAIL_NON_PRIMARY' => 'البريد الإلكتروني غير الرئيسي',
    'LBL_ANY_PHONE' => 'أي هاتف:',
    'LBL_ASSIGNED_TO_NAME' => 'المستخدم:',
    'LBL_RATING' => 'تصنيف',
    'LBL_ASSIGNED_TO' => 'أُسند إلى:',
    'LBL_ASSIGNED_USER' => 'أُسند إلى:',
    'LBL_ASSIGNED_TO_ID' => 'أُسند إلى:',
    'LBL_BILLING_ADDRESS_CITY' => 'الفواتير ترسل لمدينة:',
    'LBL_BILLING_ADDRESS_COUNTRY' => 'الفواتير ترسل لدولة:',
    'LBL_BILLING_ADDRESS_POSTALCODE' => 'الفواتير ترسل للرمز البريدي:',
    'LBL_BILLING_ADDRESS_STATE' => 'المحافظة للفواتير:',
    'LBL_BILLING_ADDRESS_STREET_2' => 'الفواتير ترسل لشارع 2',
    'LBL_BILLING_ADDRESS_STREET_3' => 'الفواتير ترسل لشارع 3',
    'LBL_BILLING_ADDRESS_STREET_4' => 'الفواتير ترسل لشارع 4',
    'LBL_BILLING_ADDRESS_STREET' => 'الفواتير ترسل لشارع:',
    'LBL_BILLING_ADDRESS' => 'الفواتير ترسل لعنوان:',
    'LBL_ACCOUNT_INFORMATION' => 'معلومات عن الشركة',
    'LBL_CITY' => 'المدينة:',
    'LBL_CONTACTS_SUBPANEL_TITLE' => 'جهات الإتصال',
    'LBL_COUNTRY' => 'الدولة:',
    'LBL_DATE_ENTERED' => 'تاريخ الإنشاء:',
    'LBL_DATE_MODIFIED' => 'تاريخ التعديل:',
    'LBL_DEFAULT_SUBPANEL_TITLE' => 'الحسابات',
    'LBL_DESCRIPTION_INFORMATION' => 'معلومات إيضاحية',
    'LBL_DESCRIPTION' => 'الوصف:',
    'LBL_DUPLICATE' => 'إحتمالية تكرار الحساب',
    'LBL_EMAIL' => 'عنوان البريد الإلكتروني:',
    'LBL_EMPLOYEES' => 'الموظفون:',
    'LBL_FAX' => 'الفاكس:',
    'LBL_INDUSTRY' => 'مجال عمل الشركة:',
    'LBL_LIST_ACCOUNT_NAME' => 'اسم الحساب',
    'LBL_LIST_CITY' => 'المدينة',
    'LBL_LIST_EMAIL_ADDRESS' => 'عنوان البريد الإلكتروني',
    'LBL_LIST_PHONE' => 'هاتف',
    'LBL_LIST_STATE' => 'المحافظة',
    'LBL_MEMBER_OF' => 'عضو في:',
    'LBL_MEMBER_ORG_SUBPANEL_TITLE' => 'عضو بمنظمات',
    'LBL_NAME' => 'الاسم:',
    'LBL_OTHER_EMAIL_ADDRESS' => 'بريد إلكتروني إضافي:',
    'LBL_OTHER_PHONE' => 'رقم هاتف آخر:',
    'LBL_OWNERSHIP' => 'حق المُلكية لـ:',
    'LBL_PARENT_ACCOUNT_ID' => 'الرقم التعريفي للحساب الأساسي',
    'LBL_PHONE_ALT' => 'الهاتف البديل:',
    'LBL_PHONE_FAX' => 'فاكس:',
    'LBL_PHONE_OFFICE' => 'هاتف المكتب:',
    'LBL_PHONE' => 'الهاتف:',
    'LBL_EMAIL_ADDRESS' => 'عنوان البريد الإلكتروني',
    'LBL_EMAIL_ADDRESSES' => 'عناوين البريد الإلكتروني',
    'LBL_POSTAL_CODE' => 'الرمز البريدي:',
    'LBL_SAVE_ACCOUNT' => 'حفظ الحساب',
    'LBL_SHIPPING_ADDRESS_CITY' => 'يُشحن لمدينة:',
    'LBL_SHIPPING_ADDRESS_COUNTRY' => 'يُشحن لدولة:',
    'LBL_SHIPPING_ADDRESS_POSTALCODE' => 'الرمز البريدي للشحن:',
    'LBL_SHIPPING_ADDRESS_STATE' => 'الشحن لمحافظة:',
    'LBL_SHIPPING_ADDRESS_STREET_2' => 'يُشحن لشارع 2',
    'LBL_SHIPPING_ADDRESS_STREET_3' => 'يُشحن لشارع 3',
    'LBL_SHIPPING_ADDRESS_STREET_4' => 'يُشحن لشارع 4',
    'LBL_SHIPPING_ADDRESS_STREET' => 'يُشحن لشارع:',
    'LBL_SHIPPING_ADDRESS' => 'عنوان الشحن:',

    'LBL_STATE' => 'المحافظة:',
    'LBL_TICKER_SYMBOL' => 'رمز السهم:',
    'LBL_TYPE' => 'النوع:',
    'LBL_WEBSITE' => 'موقع الإنترنت:',

    'LNK_ACCOUNT_LIST' => 'الحسابات',
    'LNK_NEW_ACCOUNT' => 'إنشاء حساب',

    'MSG_DUPLICATE' => 'إن سجل الحساب الذي أنشأته قد يكون تكرار لحساب موجود مُسبقاً. سجلات الحساب الذي يحتوي أسماء مُتشابهة مُدرجة بالأسفل.<br>أُنقر إنشاء الحساب للاستمرار في إنشاء هذا الحساب الجديد، أو حدد الحساب الموجود مسبقاً والمُدرح بالأسفل.',
    'MSG_SHOW_DUPLICATES' => 'قد يكون سجل الحساب المُراد إنشائه هو تكرار لسجل حساب موجود مُسبقاً. سجلات الحساب تحتوي على أسماء مشابهة لما هو مذكور أدناه. <br>"انقر فوق حفظ حتى تتابع عملية إنشاء هذا الحساب الجديد، أو انقر فوق إلغاء للرجوع بدون إنشاء هذا الحساب.',

    'NTC_DELETE_CONFIRMATION' => 'هل أنت متأكد من أنك تريد حذف هذا السجل؟',

    'LBL_EDIT_BUTTON' => 'تحرير  ',
    'LBL_REMOVE' => 'حذف',

);
