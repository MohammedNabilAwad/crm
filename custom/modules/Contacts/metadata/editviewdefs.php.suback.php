<?php
$viewdefs ['Contacts'] = array (
		'EditView' => array (
				'templateMeta' => array (
						'form' => array (
								'hidden' => array (
										0 => '<input type="hidden" name="opportunity_id" value="{$smarty.request.opportunity_id}">',
										1 => '<input type="hidden" name="case_id" value="{$smarty.request.case_id}">',
										2 => '<input type="hidden" name="bug_id" value="{$smarty.request.bug_id}">',
										3 => '<input type="hidden" name="email_id" value="{$smarty.request.email_id}">',
										4 => '<input type="hidden" name="inbound_email_id" value="{$smarty.request.inbound_email_id}">'
								)
						),
						'maxColumns' => '2',
						'widths' => array (
								0 => array (
										'label' => '10',
										'field' => '30'
								),
								1 => array (
										'label' => '10',
										'field' => '30'
								)
						),
						'includes' => array (
								0 => array (
										'file' => 'custom/modules/Contacts/osy_editview.js'
								),
								1 => array (
										'file' => 'custom/include/osyDependency.js'
								)
						),
						// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
						// *************************************************

						// 2 => array (
						// 'file' => 'custom/modules/Contacts/osyDependency.js.php'
						// )

						// 'javascript' => '
						// <script type="text/javascript">
						// {literal}
						// if(typeof(SUGAR) != \'undefined\' && typeof(SUGAR.util) != \'undefined\' && typeof(SUGAR.util.doWhen) != \'undefined\') {

						// SUGAR.util.doWhen("document.getElementById(\'footer\') && typeof(HideViewFields) != \'undefined\' ", function() {

						// HideViewFields();
						// YAHOO.util.Event.addListener(\'role_function\', \'change\', HideViewFields );

						// });

						// }
						// {/literal}
						// </script>
						// ',

						// OPENSYMBOLMOD - END - davide.dallapozza
						// *************************************************
						'useTabs' => false,
						'tabDefs' => array (
								'LBL_CONTACT_INFORMATION' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_PANEL_ADVANCED' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_PANEL_ASSIGNMENT' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								)
						),
						'syncDetailEditViews' => true
				),
				'panels' => array (
						'lbl_contact_information' => array (
								0 => array (
										0 => array (
												'name' => 'last_name'
										),
										1 => array (
												'name' => 'first_name',
												'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">'
										)
								),
								1 => array (
										0 => array (
												'name' => 'gender_c',
												'studio' => 'visible',
												'label' => 'LBL_GENDER'
										),
										1 => array (
												'name' => 'account_name',
												'displayParams' => array (
														'required' => true,
														'key' => 'billing',
														'copy' => 'primary',
														'billingKey' => 'primary',
														'additionalFields' => array (
																'phone_office' => 'phone_work'
														)
												)
										)
								),
								2 => array (
										0 => array (
												'name' => 'phone_work',
												'comment' => 'Work phone number of the contact',
												'label' => 'LBL_OFFICE_PHONE'
										)
								),
								3 => array (
										0 => array (
												'name' => 'phone_fax',
												'comment' => 'Contact fax number',
												'label' => 'LBL_FAX_PHONE'
										)
								),
								4 => array (
										0 => array (
												'name' => 'primary_address_street',
												'hideLabel' => true,
												'type' => 'osyaddress',
												'displayParams' => array (
														'key' => 'primary',
														'rows' => 2,
														'cols' => 30,
														'maxlength' => 150
												)
										),
										1 => array (
												'name' => 'alt_address_street',
												'hideLabel' => true,
												'type' => 'osyaddress',
												'displayParams' => array (
														'key' => 'alt',
														'copy' => 'primary',
														'rows' => 2,
														'cols' => 30,
														'maxlength' => 150
												)
										)
								),
								5 => array (
										0 => array (
												'name' => 'email1',
												'studio' => 'false',
												'label' => 'LBL_EMAIL_ADDRESS'
										)
								),
								6 => array (
										0 => array (
												'name' => 'description',
												'label' => 'LBL_DESCRIPTION'
										)
								)
						),
						'LBL_PANEL_ADVANCED' => array (
								0 => array (
										0 => array (
												'name' => 'role_function',
												'label' => 'LBL_ROLE_FUNCTION'
										),
										1 => array (
												'name' => 'other_role_function',
												'label' => 'LBL_OTHER_ROLE_FUNCTION'
										)
								),

								// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
								// *************************************************

								// 1 => array (
								// 0 => array (
								// 'name' => 'contact_type',
								// 'label' => 'LBL_CONTACT_TYPE'
								// ),

								// 1 => array (
								// 'name' => 'vip',
								// 'label' => 'LBL_VIP'
								// )
								// ),

								// 2 => array (
								// 0 => '',
								// 1 => array (
								// 'name' => 'main_representative_c',
								// 'label' => 'LBL_MAIN_REPRESENTATIVE'
								// )
								// ),
								1 => array (
										0 => array (
												'name' => 'vip',
												'label' => 'LBL_VIP'
										),
										1 => array (
												'name' => 'main_representative_c',
												'label' => 'LBL_MAIN_REPRESENTATIVE'
										)
								),
								// OPENSYMBOLMOD - END - davide.dallapozza
								// *************************************************
								2 => array (
										0 => array (
												'name' => 'category',
												'label' => 'LBL_CATEGORY'
										),
										1 => ''
								),
								3 => array (
										0 => array (
												'name' => 'sync_contact',
												'comment' => 'Synch to outlook?  (Meta-Data only)',
												'label' => 'LBL_SYNC_CONTACT'
										),
										1 => 'committees',
								),
								4 => array (
										0 => array (
												'name' => 'do_not_call',
												'comment' => 'An indicator of whether contact can be called',
												'label' => 'LBL_DO_NOT_CALL'
										)
								)
						),
						'LBL_PANEL_ASSIGNMENT' => array (
								0 => array (
										0 => array (
												'name' => 'assigned_user_name',
												'label' => 'LBL_ASSIGNED_TO_NAME'
										)
								)
						)
				)
		)
);
?>
