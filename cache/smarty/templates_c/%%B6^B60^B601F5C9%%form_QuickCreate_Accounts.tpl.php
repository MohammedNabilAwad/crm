<?php /* Smarty version 2.6.31, created on 2023-09-30 13:36:46
         compiled from cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_include', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 61, false),array('function', 'sugar_translate', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 82, false),array('function', 'counter', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 107, false),array('function', 'sugar_number_format', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 145, false),array('function', 'html_options', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 259, false),array('function', 'sugar_getimagepath', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 287, false),array('function', 'multienum_to_array', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 556, false),array('block', 'minify', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 98, false),array('modifier', 'strip_semicolon', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 100, false),array('modifier', 'lookup', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 284, false),array('modifier', 'count', 'cache/themes/SuiteP/modules/Accounts/form_QuickCreate_Accounts.tpl', 386, false),)), $this); ?>


<script>
    <?php echo '
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });

        if($(\'.edit-view-pagination\').children().length == 0) $(\'.saveAndContinue\').remove();
    });
    '; ?>

</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="<?php echo $this->_tpl_vars['form_name']; ?>
" id="<?php echo $this->_tpl_vars['form_id']; ?>
" <?php echo $this->_tpl_vars['enctype']; ?>
>
<div class="edit-view-pagination-mobile-container">
<div class="edit-view-pagination edit-view-mobile-pagination">
</div>
</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="<?php echo $this->_tpl_vars['module']; ?>
">
<?php if (isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true'): ?>
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php else: ?>
<input type="hidden" name="record" value="<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
">
<?php endif; ?>
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="<?php echo $_REQUEST['return_module']; ?>
">
<input type="hidden" name="return_action" value="<?php echo $_REQUEST['return_action']; ?>
">
<input type="hidden" name="return_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
<?php if (( ! empty ( $_REQUEST['return_module'] ) || ! empty ( $_REQUEST['relate_to'] ) ) && ! ( isset ( $_REQUEST['isDuplicate'] ) && $_REQUEST['isDuplicate'] == 'true' )): ?>
<input type="hidden" name="relate_to" value="<?php if ($_REQUEST['return_relationship']): ?><?php echo $_REQUEST['return_relationship']; ?>
<?php elseif ($_REQUEST['relate_to'] && empty ( $_REQUEST['from_dcmenu'] )): ?><?php echo $_REQUEST['relate_to']; ?>
<?php elseif (empty ( $this->_tpl_vars['isDCForm'] ) && empty ( $_REQUEST['from_dcmenu'] )): ?><?php echo $_REQUEST['return_module']; ?>
<?php endif; ?>">
<input type="hidden" name="relate_id" value="<?php echo $_REQUEST['return_id']; ?>
">
<?php endif; ?>
<input type="hidden" name="offset" value="<?php echo $this->_tpl_vars['offset']; ?>
">
<?php $this->assign('place', '_HEADER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"> 
<?php if ($this->_tpl_vars['showVCRControl']): ?>
<button type="button" id="save_and_continue" class="button saveAndContinue" title="<?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>
" onClick="SUGAR.saveAndContinue(this);">
<?php echo $this->_tpl_vars['APP']['LBL_SAVE_AND_CONTINUE']; ?>

</button>
<?php endif; ?>
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')): ?><?php if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif; ?><?php endif; ?>
</div>
</td>
<td align='right' class="edit-view-pagination-desktop-container">
<div class="edit-view-pagination edit-view-pagination-desktop">
</div>
</td>
</tr>
</table>
<?php echo smarty_function_sugar_include(array('include' => $this->_tpl_vars['includes']), $this);?>

<div id="EditView_tabs">

<ul class="nav nav-tabs">
</ul>
<div class="clearfix"></div>
<div class="tab-content" style="padding: 0; border: 0;">

<div class="tab-pane panel-collapse">&nbsp;</div>
</div>

<div class="panel-content">
<div>&nbsp;</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
<?php echo smarty_function_sugar_translate(array('label' => 'DEFAULT','module' => 'Accounts'), $this);?>

</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_-1" data-id="DEFAULT">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_NAME">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<span class="required">*</span>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="name" field="name"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['name']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['name']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['name']['name']; ?>
' size='30' 
maxlength='150' 
value='<?php echo $this->_tpl_vars['value']; ?>
' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MEMBER_NUMBER_SYSTEM">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_NUMBER_SYSTEM','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="int" field="member_number_system_c"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['member_number_system_c']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['member_number_system_c']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['member_number_system_c']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['member_number_system_c']['name']; ?>
' 
id='<?php echo $this->_tpl_vars['fields']['member_number_system_c']['name']; ?>
' size='30' maxlength='255' value='<?php echo smarty_function_sugar_number_format(array('precision' => 0,'var' => $this->_tpl_vars['value']), $this);?>
' title='' tabindex='0'    >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_WEBSITE">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="url" field="website"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (! empty ( $this->_tpl_vars['fields']['website']['value'] )): ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255' value='<?php echo $this->_tpl_vars['fields']['website']['value']; ?>
' title='' tabindex='0'  >
<?php else: ?>
<input type='text' name='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['website']['name']; ?>
' size='30' 
maxlength='255'	   	   <?php if ($this->_tpl_vars['displayView'] == 'advanced_search' || $this->_tpl_vars['displayView'] == 'basic_search'): ?>value=''<?php else: ?>value='http://'<?php endif; ?> 
title='' tabindex='0'  >
<?php endif; ?>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_PHONE_OFFICE">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="phone_office"  class="phone">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_office']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_office']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_office']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_office']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_EMAIL">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="email1" colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>

<span id='email1_span'>
<?php echo $this->_tpl_vars['fields']['email1']['value']; ?>
</span>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MEMBER_TYPE">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_TYPE','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="member_type"  >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<select name="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
" 
title=''       
>
<?php if (isset ( $this->_tpl_vars['fields']['member_type']['value'] ) && $this->_tpl_vars['fields']['member_type']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['member_type']['options'],'selected' => $this->_tpl_vars['fields']['member_type']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['member_type']['options'],'selected' => $this->_tpl_vars['fields']['member_type']['default']), $this);?>

<?php endif; ?>
</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['member_type']['options']); ?>
<?php ob_start(); ?><?php echo $this->_tpl_vars['fields']['member_type']['value']; ?>
<?php $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start(); ?><?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<select style='display:none' name="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
" 
title=''          
>
<?php if (isset ( $this->_tpl_vars['fields']['member_type']['value'] ) && $this->_tpl_vars['fields']['member_type']['value'] != ''): ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['member_type']['options'],'selected' => $this->_tpl_vars['fields']['member_type']['value']), $this);?>

<?php else: ?>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['member_type']['options'],'selected' => $this->_tpl_vars['fields']['member_type']['default']), $this);?>

<?php endif; ?>
</select>
<input
id="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input"
size="30"
value="<?php echo ((is_array($_tmp=$this->_tpl_vars['field_val'])) ? $this->_run_mod_handler('lookup', true, $_tmp, $this->_tpl_vars['field_options']) : smarty_modifier_lookup($_tmp, $this->_tpl_vars['field_options'])); ?>
"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-image"></button><button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
');sync_<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<?php echo '
<script>
	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo ' = [];
	'; ?>


			<?php echo '
		(function (){
			var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo '");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:\'\'};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use(\'datasource\', \'datasource-jsonschema\',function (Y) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
				    			ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		'; ?>

	
	<?php echo '
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	'; ?>

			
	SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input');
	SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-image');
	SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
');
	
			<?php echo '
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo '");
				var doSimulateChange = false;
				
				if (selectElem.value!=selectme)
					doSimulateChange=true;
				
				selectElem.value=selectme;

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
					if (selectElem.options[i].value==selectme)
						selectElem.options[i].selected=true;
				}

				if (doSimulateChange)
					SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'change\');
			}

			//global variable 
			sync_'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo ' = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo '");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\');

				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.simulate(\'keyup\');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById(\''; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
-input<?php echo '\'))
						SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.set(\'value\',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo '", syncFromHiddenToWidget);
		'; ?>


		SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
		SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
		SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
		if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
			'; ?>

			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
			<?php echo '
		}
		'; ?>

		if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
			'; ?>

			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
			<?php echo '
		}
		'; ?>

		
	SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.optionsVisible = false;
	
	<?php echo '
	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		'; ?>

		minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
		queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
		zIndex: 99999,

				
		<?php echo '
		source: SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.ds,
		
		resultTextLocator: \'text\',
		resultHighlighter: \'phraseMatch\',
		resultFilters: \'phraseMatch\',
	});

	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName(\'dccontent\');
		if(hover[0] != null){
			if (ex) {
				var h = \'1000px\';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = \'\';
			}
		}
	}
		
	if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'focus\', function () {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.sendRequest(\'\');
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'click\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'click\');
		});
		
		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'dblclick\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'dblclick\');
		});

		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'focus\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'focus\');
		});

		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'mouseup\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'mouseup\');
		});

		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'mousedown\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'mousedown\');
		});

		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'blur\', function(e) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'blur\');
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.optionsVisible = false;
			var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['member_type']['name']; ?>
<?php echo '");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.set(\'value\', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputImage.ancestor().on(\'click\', function () {
		if (SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.optionsVisible) {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.blur();
		} else {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.on(\'query\', function () {
		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.set(\'value\', \'\');
	});

	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.on(\'visibleChange\', function (e) {
		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.on(\'select\', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
'; ?>

<?php endif; ?>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_FAX">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="phone_fax"  class="phone">
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (strlen ( $this->_tpl_vars['fields']['phone_fax']['value'] ) <= 0): ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['default_value']); ?>
<?php else: ?>
<?php $this->assign('value', $this->_tpl_vars['fields']['phone_fax']['value']); ?>
<?php endif; ?>  
<input type='text' name='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' id='<?php echo $this->_tpl_vars['fields']['phone_fax']['name']; ?>
' size='30' maxlength='100' value='<?php echo $this->_tpl_vars['value']; ?>
' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_INDUSTRY">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="multienum" field="industry" colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<?php if (! isset ( $this->_tpl_vars['config']['enable_autocomplete'] ) || $this->_tpl_vars['config']['enable_autocomplete'] == false): ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
_multiselect"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
_multiselect" value="true">
<?php echo smarty_function_multienum_to_array(array('string' => $this->_tpl_vars['fields']['industry']['value'],'default' => $this->_tpl_vars['fields']['industry']['default'],'assign' => 'values'), $this);?>

<select id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['values']), $this);?>

</select>
<?php else: ?>
<?php $this->assign('field_options', $this->_tpl_vars['fields']['industry']['options']); ?>
<?php ob_start(); ?><?php echo $this->_tpl_vars['fields']['industry']['value']; ?>
<?php $this->_smarty_vars['capture']['field_val'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('field_val', $this->_smarty_vars['capture']['field_val']); ?>
<?php ob_start(); ?><?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
<?php $this->_smarty_vars['capture']['ac_key'] = ob_get_contents(); ob_end_clean(); ?>
<?php $this->assign('ac_key', $this->_smarty_vars['capture']['ac_key']); ?>
<input type="hidden" id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
_multiselect"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
_multiselect" value="true">
<?php echo smarty_function_multienum_to_array(array('string' => $this->_tpl_vars['fields']['industry']['value'],'default' => $this->_tpl_vars['fields']['industry']['default'],'assign' => 'values'), $this);?>

<select style='display:none' id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['fields']['industry']['options'],'selected' => $this->_tpl_vars['values']), $this);?>

</select>
<input
id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
name="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
size="60"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button">
<img src="<?php echo smarty_function_sugar_getimagepath(array('file' => "id-ff-down.png"), $this);?>
" id="<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-image">
</button>
<button type="button"
id="btn-clear-<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input', '<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
;');SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode.updateHidden()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<?php echo '
<script>
	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo ' = [];
	'; ?>


			<?php echo '
		YUI().use(\'datasource\', \'datasource-jsonschema\', function (Y) {
					SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.ds = new Y.DataSource.Function({
					    source: function (request) {
					    	var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
<?php echo '");
					    	var ret = [];
					    	for (i=0;i<selectElem.options.length;i++)
					    		if (!(selectElem.options[i].value==\'\' && selectElem.options[i].innerHTML==\'\'))
					    			ret.push({\'key\':selectElem.options[i].value,\'text\':selectElem.options[i].innerHTML});
					    	return ret;
					    }
					});
				});
		'; ?>

	
	<?php echo '
	YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters","node-event-simulate", function (Y) {
		'; ?>

		
	    SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputNode = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input');
	    SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputImage = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-image');
	    SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.inputHidden = Y.one('#<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
');

					SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 0;
			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 0;
			SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions = <?php echo count($this->_tpl_vars['field_options']); ?>
;
			if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 300) <?php echo '{
				'; ?>

				SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
				SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 200;
				<?php echo '
			}
			'; ?>

			if(SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.numOptions >= 3000) <?php echo '{
				'; ?>

				SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen = 1;
				SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay = 500;
				<?php echo '
			}
			'; ?>

				
				<?php echo '
	    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.plug(Y.Plugin.AutoComplete, {
	        activateFirstItem: true,
	        allowTrailingDelimiter: true,
			'; ?>

	        minQueryLength: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen,
	        queryDelay: SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.queryDelay,
	        queryDelimiter: ',',
	        zIndex: 99999,

						<?php echo '
			source: SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.ds,
			
	        resultTextLocator: \'text\',
	        resultHighlighter: \'phraseMatch\',
	        resultFilters: \'phraseMatch\',
	        // Chain together a startsWith filter followed by a custom result filter
	        // that only displays tags that haven\'t already been selected.
	        resultFilters: [\'phraseMatch\', function (query, results) {
		        // Split the current input value into an array based on comma delimiters.
	        	var selected = SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);
	        
	            // Convert the array into a hash for faster lookups.
	            selected = Y.Array.hash(selected);

	            // Filter out any results that are already selected, then return the
	            // array of filtered results.
	            return Y.Array.filter(results, function (result) {
	               return !selected.hasOwnProperty(result.text);
	            });
	        }]
	    });
		'; ?>
<?php echo '
		if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
		    // expand the dropdown options upon focus
		    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'focus\', function () {
		        SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.sendRequest(\'\');
		    });
		}

				    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateHidden = function() {
				var index_array = SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);

				var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
<?php echo '");

				var oTable = {};
		    	for (i=0;i<selectElem.options.length;i++){
		    		if (selectElem.options[i].selected)
		    			oTable[selectElem.options[i].value] = true;
		    	}

				for (i=0;i<selectElem.options.length;i++){
					selectElem.options[i].selected=false;
				}

				var nTable = {};

				for (i=0;i<index_array.length;i++){
					var key = index_array[i];
					for (c=0;c<selectElem.options.length;c++)
						if (selectElem.options[c].innerHTML == key){
							selectElem.options[c].selected=true;
							nTable[selectElem.options[c].value]=1;
						}
				}

				//the following two loops check to see if the selected options are different from before.
				//oTable holds the original select. nTable holds the new one
				var fireEvent=false;
				for (n in nTable){
					if (n==\'\')
						continue;
		    		if (!oTable.hasOwnProperty(n))
		    			fireEvent = true; //the options are different, fire the event
		    	}
		    	
		    	for (o in oTable){
		    		if (o==\'\')
		    			continue;
		    		if (!nTable.hasOwnProperty(o))
		    			fireEvent=true; //the options are different, fire the event
		    	}

		    	//if the selected options are different from before, fire the \'change\' event
		    	if (fireEvent){
		    		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'change\');
		    	}
		    };

		    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateText = function() {
		    	//get last option typed into the input widget
		    	SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.set(SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\'));
				var index_array = SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.get(\'value\').split(/\\s*,\\s*/);
				//create a string ret_string as a comma-delimited list of text from selectElem options.
				var selectElem = document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
<?php echo '");
				var ret_array = [];

                if (selectElem==null || selectElem.options == null)
					return;

				for (i=0;i<selectElem.options.length;i++){
					if (selectElem.options[i].selected && selectElem.options[i].innerHTML!=\'\'){
						ret_array.push(selectElem.options[i].innerHTML);
					}
				}

				//index array - array from input
				//ret array - array from select

				var sorted_array = [];
				var notsorted_array = [];
				for (i=0;i<index_array.length;i++){
					for (c=0;c<ret_array.length;c++){
						if (ret_array[c]==index_array[i]){
							sorted_array.push(ret_array[c]);
							ret_array.splice(c,1);
						}
					}
				}
				ret_string = ret_array.concat(sorted_array).join(\', \');
				if (ret_string.match(/^\\s*$/))
					ret_string=\'\';
				else
					ret_string+=\', \';
				
				//update the input widget
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.set(\'value\', ret_string);
		    };

		    function updateTextOnInterval(){
		    	if (document.activeElement != document.getElementById("'; ?>
<?php echo $this->_tpl_vars['fields']['industry']['name']; ?>
-input<?php echo '"))
		    		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateText();
		    	setTimeout(updateTextOnInterval,100);
		    }

		    updateTextOnInterval();
		
					SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'click\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'click\');
			});
			
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'dblclick\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'dblclick\');
			});

			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'focus\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'focus\');
			});

			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'mouseup\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'mouseup\');
			});

			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'mousedown\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'mousedown\');
			});

			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'blur\', function(e) {
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputHidden.simulate(\'blur\');
			});
		
		SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.on(\'blur\', function () {
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateHidden();
			SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateText();
		});
	
	    // when they click on the arrow image, toggle the visibility of the options
	    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputImage.on(\'click\', function () {
			if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.sendRequest(\'\');
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.show();
			}
			else{
				SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.focus();
			}
	    });
	
		if('; ?>
SUGAR.AutoComplete.<?php echo $this->_tpl_vars['ac_key']; ?>
.minQLen<?php echo ' == 0){
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.after(\'select\', function () {
		      SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.sendRequest(\'\');
		      SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.show();
			  SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateHidden();
			  SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateText();
		    });
		} else {
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.ac.after(\'select\', function () {
			  SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateHidden();
			  SUGAR.AutoComplete.'; ?>
<?php echo $this->_tpl_vars['ac_key']; ?>
<?php echo '.inputNode.updateText();
		    });
		}
	});
	</script>
'; ?>

<?php endif; ?>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_ASSIGNED_TO">

<?php $this->_tag_stack[] = array('minify', array()); $_block_repeat=true;smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php ob_start(); ?><?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts'), $this);?>
<?php $this->_smarty_vars['capture']['label'] = ob_get_contents();  $this->assign('label', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['label'])) ? $this->_run_mod_handler('strip_semicolon', true, $_tmp) : smarty_modifier_strip_semicolon($_tmp)); ?>
:

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="assigned_user_name" colspan='3' >
<?php echo smarty_function_counter(array('name' => 'panelFieldCount','print' => false), $this);?>


<input type="text" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" class="sqsEnabled" tabindex="0" id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" size="" value="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['value']; ?>
" title='' autocomplete="off"  	 >
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
id="<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
" 
value="<?php echo $this->_tpl_vars['fields']['assigned_user_id']['value']; ?>
">
<span class="id-ff multiple">
<button type="button" name="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_TITLE'), $this);?>
" class="button firstChild" value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_SELECT_USERS_LABEL'), $this);?>
"
onclick='open_popup(
"<?php echo $this->_tpl_vars['fields']['assigned_user_name']['module']; ?>
", 
600, 
400, 
"", 
true, 
false, 
<?php echo '{"call_back_function":"set_return","form_name":"form_QuickCreate_Accounts","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}'; ?>
, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" id="btn_clr_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
" tabindex="0" title="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_TITLE'), $this);?>
"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
', '<?php echo $this->_tpl_vars['fields']['assigned_user_name']['id_name']; ?>
');"  value="<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ACCESSKEY_CLEAR_USERS_LABEL'), $this);?>
" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['<?php echo $this->_tpl_vars['form_name']; ?>
_<?php echo $this->_tpl_vars['fields']['assigned_user_name']['name']; ?>
']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>
</div>
</div>

<script language="javascript">
    var _form_id = '<?php echo $this->_tpl_vars['form_id']; ?>
';
    <?php echo '
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == \'\') ? \'EditView\' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    '; ?>

</script>
<?php $this->assign('place', '_FOOTER'); ?> <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
<?php if ($this->_tpl_vars['bean']->aclAccess('save')): ?><input title="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_KEY']; ?>
" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="<?php echo $this->_tpl_vars['APP']['LBL_SAVE_BUTTON_LABEL']; ?>
"><?php endif; ?> 
<input title="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_TITLE']; ?>
" accessKey="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_KEY']; ?>
" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="<?php echo $this->_tpl_vars['APP']['LBL_CANCEL_BUTTON_LABEL']; ?>
"> 
<?php if ($this->_tpl_vars['showVCRControl']): ?>
<button type="button" id="save_and_continue" class="button saveAndContinue" title="<?php echo $this->_tpl_vars['app_strings']['LBL_SAVE_AND_CONTINUE']; ?>
" onClick="SUGAR.saveAndContinue(this);">
<?php echo $this->_tpl_vars['APP']['LBL_SAVE_AND_CONTINUE']; ?>

</button>
<?php endif; ?>
<?php if ($this->_tpl_vars['bean']->aclAccess('detail')): ?><?php if (! empty ( $this->_tpl_vars['fields']['id']['value'] ) && $this->_tpl_vars['isAuditEnabled']): ?><input id="btn_view_change_log" title="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
" class="button" onclick='open_popup("Audit", "600", "400", "&record=<?php echo $this->_tpl_vars['fields']['id']['value']; ?>
&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="button" value="<?php echo $this->_tpl_vars['APP']['LNK_VIEW_CHANGE_LOG']; ?>
"><?php endif; ?><?php endif; ?>
</div>
</form>
<?php echo $this->_tpl_vars['set_focus_block']; ?>

<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){SUGAR.util.buildAccessKeyLabels();});
</script>
<script type="text/javascript">
YAHOO.util.Event.onContentReady("form_QuickCreate_Accounts",
    function () { initEditView(document.forms.form_QuickCreate_Accounts) });
//window.setTimeout(, 100);
window.onbeforeunload = function () { return onUnloadEditView(); };
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {
$(document).ready(function() {
    $(".collapseLink,.expandLink").click(function (e) { e.preventDefault(); });
  });
}
</script>
<?php echo '
<script type="text/javascript">

    var selectTab = function(tab) {
        $(\'#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER\').hide();
        $(\'#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER\').eq(tab).show().addClass(\'active\').addClass(\'in\');
        $(\'#EditView_tabs div.panel-content div.panel\').hide();
        $(\'#EditView_tabs div.panel-content div.panel.tab-panel-\' + tab).show()
    };

    var selectTabOnError = function(tab) {
        selectTab(tab);
        $(\'#EditView_tabs ul.nav.nav-tabs li\').removeClass(\'active\');
        $(\'#EditView_tabs ul.nav.nav-tabs li a\').css(\'color\', \'\');

        $(\'#EditView_tabs ul.nav.nav-tabs li\').eq(tab).find(\'a\').first().css(\'color\', \'red\');
        $(\'#EditView_tabs ul.nav.nav-tabs li\').eq(tab).addClass(\'active\');

    };

    var selectTabOnErrorInputHandle = function(inputHandle) {
        var tab = $(inputHandle).closest(\'.tab-pane-NOBOOTSTRAPTOGGLER\').attr(\'id\').match(/^detailpanel_(.*)$/)[1];
        selectTabOnError(tab);
    };


    $(function(){
        $(\'#EditView_tabs ul.nav.nav-tabs li > a[data-toggle="tab"]\').click(function(e){
            if(typeof $(this).parent().find(\'a\').first().attr(\'id\') != \'undefined\') {
                var tab = parseInt($(this).parent().find(\'a\').first().attr(\'id\').match(/^tab(.)*$/)[1]);
                selectTab(tab);
            }
        });

        $(\'a[data-toggle="collapse-edit"]\').click(function(e){
            if($(this).hasClass(\'collapsed\')) {
              // Expand panel
                // Change style of .panel-header
                $(this).removeClass(\'collapsed\');
                // Expand .panel-body
                $(this).parents(\'.panel\').find(\'.panel-body\').removeClass(\'in\').addClass(\'in\');
            } else {
              // Collapse panel
                // Change style of .panel-header
                $(this).addClass(\'collapsed\');
                // Collapse .panel-body
                $(this).parents(\'.panel\').find(\'.panel-body\').removeClass(\'in\').removeClass(\'in\');
            }
        });
    });

    </script>
'; ?>
<?php echo '
<script type="text/javascript">
addForm(\'form_QuickCreate_Accounts\');addToValidate(\'form_QuickCreate_Accounts\', \'name\', \'name\', true,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_entered_date\', \'date\', false,\'تاريخ الإنشاء\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_modified_date\', \'date\', false,\'تاريخ التعديل\' );
addToValidate(\'form_QuickCreate_Accounts\', \'modified_user_id\', \'assigned_user_name\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'modified_by_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MODIFIED_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'created_by\', \'assigned_user_name\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'created_by_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CREATED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'description\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DESCRIPTION','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'deleted\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DELETED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'assigned_user_id\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_ID','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'assigned_user_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'account_type\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'industry[]\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'annual_revenue\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_REVENUE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_fax\', \'phone\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FAX','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_2\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_3\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_street_4\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_city\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_state\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_postalcode\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_country\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'rating\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_RATING','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_office\', \'phone\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_OFFICE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_alternate\', \'phone\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_ALT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'website\', \'url\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_WEBSITE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'ownership\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OWNERSHIP','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'employees\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMPLOYEES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'ticker_symbol\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TICKER_SYMBOL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_2\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_2','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_3\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_3','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_street_4\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STREET_4','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_city\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_CITY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_state\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_STATE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_postalcode\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_country\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_COUNTRY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email1\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email_addresses_non_primary\', \'email\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_NON_PRIMARY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parent_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PARENT_ACCOUNT_ID','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'sic_code\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SIC_CODE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'parent_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_OF','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email_opt_out\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_EMAIL_OPT_OUT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'invalid_email\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_INVALID_EMAIL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'email\', \'email\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ANY_EMAIL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'campaign_id\', \'id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN_ID','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'campaign_name\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CAMPAIGN','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_lat_c\', \'float\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_LAT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_geocode_status_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_GEOCODE_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'company_id_or_vat\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMPANY_ID_OR_VAT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'member_type\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_TYPE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_address_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_ADDRESS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'lead_source\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LEAD_SOURCE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'other_company_number\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_COMPANY_NUMBER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'other\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'billing_address_other\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BILLING_ADDRESS_OTHER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_other\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_OTHER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'total_salary_wage_bill\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_SALARY_WAGE_BILL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_employees_at\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_EMPLOYEES_AT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_employees_at\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_EMPLOYEES_AT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'association_member_type\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSOCIATION_MEMBER_TYPE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'territorial\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TERRITORIAL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_company_members\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_COMPANY_MEMBERS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'member_from\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_FROM','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'member_till\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_TILL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'membership_status\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBERSHIP_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'payment_status\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'levels\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LEVELS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'categories\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CATEGORIES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'annual_nr_rates\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ANNUAL_NR_RATES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'subscription_fees\', \'currency\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBSCRIPTION_FEES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'first_invoice_date\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FIRST_INVOICE_DATE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'last_invoice_date\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LAST_INVOICE_DATE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'subcategories[]\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBCATEGORIES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'five_main_operating_markets\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FIVE_MAIN_OPERATING_MARKETS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'target_exporting_markets\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TARGET_EXPORTING_MARKETS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'type_of_business\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE_OF_BUSINESS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'products_and_services\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PRODUCTS_AND_SERVICES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_directors\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_DIRECTORS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_permanent\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_PERMANENT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_casual\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_CASUAL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_seasonal\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_SEASONAL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_pobox_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_POBOX','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'shipping_address_region_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHIPPING_ADDRESS_REGION','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'committees[]\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMMITTEES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'osy_account_code\', \'int\', true,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OSY_ACCOUNT_CODE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'e_invite_status_fields\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONT_INVITE_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'event_status_name\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_INVITE_STATUS_EVENT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'event_invite_id\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_INVITE_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'e_accept_status_fields\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CONT_ACCEPT_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'event_accept_status\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_ACCEPT_STATUS_EVENT','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'event_status_id\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_ACCEPT_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'payment_status_fields\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PAYMENT_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'osy_payment_status\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_PAYMENT_STATUS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'payment_status_id\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_PAYMENT_STATUS_ID','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'cost_fields\', \'relate\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COST','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'osy_cost\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_COST','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'cost_id\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_LIST_COST_ID','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'panel_name\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PANEL_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'osy_form_html_date_modified_c_date\', \'date\', false,\'تحديث نموذج التاريخ\' );
addToValidate(\'form_QuickCreate_Accounts\', \'total_balance\', \'currency\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TOTAL_BALANCE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'mark_as_closed\', \'bool\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MARK_AS_CLOSED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'jjwg_maps_lng_c\', \'float\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_JJWG_MAPS_LNG','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'short_company_name_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SHORT_COMPANY_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'type_activity_c[]\', \'multienum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_TYPE_ACTIVITY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'id_card_number_c\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ID_CARD_NUMBER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'phone_mobile_c\', \'phone\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_PHONE_MOBILE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'front_address_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FRONT_ADDRESS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'no_guarantees_allowed_c\', \'int\', true,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NO_GUARANTEES_ALLOWED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'commercial_registration_no_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMMERCIAL_REGISTRATION_NO','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'gender_c\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_GENDER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'role_function_c\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ROLE_FUNCTION','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'english_name_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ENGLISH_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'finders_name_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FINDERS_NAME','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'commercial_name_arabic_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMMERCIAL_NAME_ARABIC','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'issue_authority_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ISSUE_AUTHORITY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'female_foreign_worker_c\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_FEMALE_FOREIGN_WORKER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'member_number_system_c\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MEMBER_NUMBER_SYSTEM','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'was_detected_c\', \'radioenum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_WAS_DETECTED','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'industry_description_c\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_INDUSTRY_DESCRIPTION','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_female_employees_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_FEMALE_EMPLOYEES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'male_foreign_worker_c\', \'int\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_MALE_FOREIGN_WORKER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'capital_c\', \'currency\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CAPITAL','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'work_field_c\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_WORK_FIELD','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'commercial_name_english_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_COMMERCIAL_NAME_ENGLISH','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'nr_male_employees_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_NR_MALE_EMPLOYEES','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'beside_address_c\', \'varchar\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_BESIDE_ADDRESS','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'release_side_c\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_RELEASE_SIDE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'currency_id\', \'currency_id\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_CURRENCY','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'other_information_about_staf_c\', \'text\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_OTHER_INFORMATION_ABOUT_STAF','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'issue_date_id_card_c\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ISSUE_DATE_ID_CARD','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'date_issuance_register_c\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_DATE_ISSUANCE_REGISTER','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'registration_expiry_date_c\', \'date\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_REGISTRATION_EXPIRY_DATE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidate(\'form_QuickCreate_Accounts\', \'subscription_type_c\', \'enum\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_SUBSCRIPTION_TYPE','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\' );
addToValidateBinaryDependency(\'form_QuickCreate_Accounts\', \'assigned_user_name\', \'alpha\', false,\''; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'ERR_SQS_NO_MATCH_FIELD','module' => 'Accounts','for_js' => true), $this);?>
<?php echo ': '; ?>
<?php echo smarty_function_sugar_translate(array('label' => 'LBL_ASSIGNED_TO','module' => 'Accounts','for_js' => true), $this);?>
<?php echo '\', \'assigned_user_id\' );
</script><script language="javascript">if(typeof sqs_objects == \'undefined\'){var sqs_objects = new Array;}sqs_objects[\'form_QuickCreate_Accounts_assigned_user_name\']={"form":"form_QuickCreate_Accounts","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u062a\\u0637\\u0627\\u0628\\u0642"};</script>'; ?>
