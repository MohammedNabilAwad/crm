

<script>
    {literal}
    $(document).ready(function(){
	    $("ul.clickMenu").each(function(index, node){
	        $(node).sugarActionMenu();
	    });

        if($('.edit-view-pagination').children().length == 0) $('.saveAndContinue').remove();
    });
    {/literal}
</script>
<div class="clear"></div>
<form action="index.php" method="POST" name="{$form_name}" id="{$form_id}" {$enctype}>
<div class="edit-view-pagination-mobile-container">
<div class="edit-view-pagination edit-view-mobile-pagination">
</div>
</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dcQuickEdit">
<tr>
<td class="buttons">
<input type="hidden" name="module" value="{$module}">
{if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
<input type="hidden" name="record" value="">
<input type="hidden" name="duplicateSave" value="true">
<input type="hidden" name="duplicateId" value="{$fields.id.value}">
{else}
<input type="hidden" name="record" value="{$fields.id.value}">
{/if}
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="action">
<input type="hidden" name="return_module" value="{$smarty.request.return_module}">
<input type="hidden" name="return_action" value="{$smarty.request.return_action}">
<input type="hidden" name="return_id" value="{$smarty.request.return_id}">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="contact_role">
{if (!empty($smarty.request.return_module) || !empty($smarty.request.relate_to)) && !(isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true")}
<input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif $smarty.request.relate_to && empty($smarty.request.from_dcmenu)}{$smarty.request.relate_to}{elseif empty($isDCForm) && empty($smarty.request.from_dcmenu)}{$smarty.request.return_module}{/if}">
<input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
{/if}
<input type="hidden" name="offset" value="{$offset}">
{assign var='place' value="_HEADER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} 
<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> 
{if $showVCRControl}
<button type="button" id="save_and_continue" class="button saveAndContinue" title="{$app_strings.LBL_SAVE_AND_CONTINUE}" onClick="SUGAR.saveAndContinue(this);">
{$APP.LBL_SAVE_AND_CONTINUE}
</button>
{/if}
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Accounts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</div>
</td>
<td align='right' class="edit-view-pagination-desktop-container">
<div class="edit-view-pagination edit-view-pagination-desktop">
</div>
</td>
</tr>
</table>
{sugar_include include=$includes}
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
{sugar_translate label='DEFAULT' module='Accounts'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_-1" data-id="DEFAULT">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_NAME">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='Accounts'}{/capture}
{$label|strip_semicolon}:

<span class="required">*</span>
{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="name" field="name"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
id='{$fields.name.name}' size='30' 
maxlength='150' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MEMBER_NUMBER_SYSTEM">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEMBER_NUMBER_SYSTEM' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="int" field="member_number_system_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.member_number_system_c.value) <= 0}
{assign var="value" value=$fields.member_number_system_c.default_value }
{else}
{assign var="value" value=$fields.member_number_system_c.value }
{/if}  
<input type='text' name='{$fields.member_number_system_c.name}' 
id='{$fields.member_number_system_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_WEBSITE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_WEBSITE' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="url" field="website"  >
{counter name="panelFieldCount" print=false}

{if !empty($fields.website.value)}
<input type='text' name='{$fields.website.name}' id='{$fields.website.name}' size='30' 
maxlength='255' value='{$fields.website.value}' title='' tabindex='0'  >
{else}
<input type='text' name='{$fields.website.name}' id='{$fields.website.name}' size='30' 
maxlength='255'	   	   {if $displayView=='advanced_search'||$displayView=='basic_search'}value=''{else}value='http://'{/if} 
title='' tabindex='0'  >
{/if}
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_PHONE_OFFICE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="phone_office"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.phone_office.value) <= 0}
{assign var="value" value=$fields.phone_office.default_value }
{else}
{assign var="value" value=$fields.phone_office.value }
{/if}  
<input type='text' name='{$fields.phone_office.name}' id='{$fields.phone_office.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_EMAIL">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EMAIL' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="email1" colspan='3' >
{counter name="panelFieldCount" print=false}
<span id='email1_span'>
{$fields.email1.value}</span>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MEMBER_TYPE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MEMBER_TYPE' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="member_type"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.member_type.name}" 
id="{$fields.member_type.name}" 
title=''       
>
{if isset($fields.member_type.value) && $fields.member_type.value != ''}
{html_options options=$fields.member_type.options selected=$fields.member_type.value}
{else}
{html_options options=$fields.member_type.options selected=$fields.member_type.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.member_type.options }
{capture name="field_val"}{$fields.member_type.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.member_type.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.member_type.name}" 
id="{$fields.member_type.name}" 
title=''          
>
{if isset($fields.member_type.value) && $fields.member_type.value != ''}
{html_options options=$fields.member_type.options selected=$fields.member_type.value}
{else}
{html_options options=$fields.member_type.options selected=$fields.member_type.default}
{/if}
</select>
<input
id="{$fields.member_type.name}-input"
name="{$fields.member_type.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.member_type.name}-image"></button><button type="button"
id="btn-clear-{$fields.member_type.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.member_type.name}-input', '{$fields.member_type.name}');sync_{$fields.member_type.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.member_type.name}{literal}");
			
			if (typeof select_defaults =="undefined")
				select_defaults = [];
			
			select_defaults[selectElem.id] = {key:selectElem.value,text:''};

			//get default
			for (i=0;i<selectElem.options.length;i++){
				if (selectElem.options[i].value==selectElem.value)
					select_defaults[selectElem.id].text = selectElem.options[i].innerHTML;
			}

			//SUGAR.AutoComplete.{$ac_key}.ds = 
			//get options array from vardefs
			var options = SUGAR.AutoComplete.getOptionsArray("");

			YUI().use('datasource', 'datasource-jsonschema',function (Y) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
				    source: function (request) {
				    	var ret = [];
				    	for (i=0;i<selectElem.options.length;i++)
				    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
				    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
				    	return ret;
				    }
				});
			});
		})();
		{/literal}
	
	{literal}
		YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters", "node","node-event-simulate", function (Y) {
	{/literal}
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.member_type.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.member_type.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.member_type.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.member_type.name}{literal}");
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
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
			}

			//global variable 
			sync_{/literal}{$fields.member_type.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.member_type.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.member_type.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.member_type.name}{literal}", syncFromHiddenToWidget);
		{/literal}

		SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
		SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
		SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
			{literal}
		}
		{/literal}
		if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
			{/literal}
			SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
			{literal}
		}
		{/literal}
		
	SUGAR.AutoComplete.{$ac_key}.optionsVisible = false;
	
	{literal}
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
		activateFirstItem: true,
		{/literal}
		minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
		queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
		zIndex: 99999,

				
		{literal}
		source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
		
		resultTextLocator: 'text',
		resultHighlighter: 'phraseMatch',
		resultFilters: 'phraseMatch',
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover = function(ex){
		var hover = YAHOO.util.Dom.getElementsByClassName('dccontent');
		if(hover[0] != null){
			if (ex) {
				var h = '1000px';
				hover[0].style.height = h;
			}
			else{
				hover[0].style.height = '';
			}
		}
	}
		
	if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		// expand the dropdown options upon focus
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = true;
		});
	}

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
		});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
		});

		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible = false;
			var selectElem = document.getElementById("{/literal}{$fields.member_type.name}{literal}");
			//if typed value is a valid option, do nothing
			for (i=0;i<selectElem.options.length;i++)
				if (selectElem.options[i].innerHTML==SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'))
					return;
			
			//typed value is invalid, so set the text and the hidden to blank
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value', select_defaults[selectElem.id].text);
			SyncToHidden(select_defaults[selectElem.id].key);
		});
	
	// when they click on the arrow image, toggle the visibility of the options
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.ancestor().on('click', function () {
		if (SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.optionsVisible) {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.blur();
		} else {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
		}
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('query', function () {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.set('value', '');
	});

	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('visibleChange', function (e) {
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.expandHover(e.newVal); // expand
	});

	// when they select an option, set the hidden input with the KEY, to be saved
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.on('select', function(e) {
		SyncToHidden(e.result.raw.key);
	});
 
});
</script> 
{/literal}
{/if}
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_FAX">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_FAX' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="phone_fax"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.phone_fax.value) <= 0}
{assign var="value" value=$fields.phone_fax.default_value }
{else}
{assign var="value" value=$fields.phone_fax.value }
{/if}  
<input type='text' name='{$fields.phone_fax.name}' id='{$fields.phone_fax.name}' size='30' maxlength='100' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_INDUSTRY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_INDUSTRY' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="multienum" field="industry" colspan='3' >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<input type="hidden" id="{$fields.industry.name}_multiselect"
name="{$fields.industry.name}_multiselect" value="true">
{multienum_to_array string=$fields.industry.value default=$fields.industry.default assign="values"}
<select id="{$fields.industry.name}"
name="{$fields.industry.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
{html_options options=$fields.industry.options selected=$values}
</select>
{else}
{assign var="field_options" value=$fields.industry.options }
{capture name="field_val"}{$fields.industry.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.industry.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<input type="hidden" id="{$fields.industry.name}_multiselect"
name="{$fields.industry.name}_multiselect" value="true">
{multienum_to_array string=$fields.industry.value default=$fields.industry.default assign="values"}
<select style='display:none' id="{$fields.industry.name}"
name="{$fields.industry.name}[]"
multiple="true" size='6' style="width:150" title='' tabindex="0"  
>
{html_options options=$fields.industry.options selected=$values}
</select>
<input
id="{$fields.industry.name}-input"
name="{$fields.industry.name}-input"
size="60"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button">
<img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.industry.name}-image">
</button>
<button type="button"
id="btn-clear-{$fields.industry.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.industry.name}-input', '{$fields.industry.name};');SUGAR.AutoComplete.{$ac_key}.inputNode.updateHidden()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		YUI().use('datasource', 'datasource-jsonschema', function (Y) {
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds = new Y.DataSource.Function({
					    source: function (request) {
					    	var selectElem = document.getElementById("{/literal}{$fields.industry.name}{literal}");
					    	var ret = [];
					    	for (i=0;i<selectElem.options.length;i++)
					    		if (!(selectElem.options[i].value=='' && selectElem.options[i].innerHTML==''))
					    			ret.push({'key':selectElem.options[i].value,'text':selectElem.options[i].innerHTML});
					    	return ret;
					    }
					});
				});
		{/literal}
	
	{literal}
	YUI().use("autocomplete", "autocomplete-filters", "autocomplete-highlighters","node-event-simulate", function (Y) {
		{/literal}
		
	    SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.industry.name}-input');
	    SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.industry.name}-image');
	    SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.industry.name}');

					SUGAR.AutoComplete.{$ac_key}.minQLen = 0;
			SUGAR.AutoComplete.{$ac_key}.queryDelay = 0;
			SUGAR.AutoComplete.{$ac_key}.numOptions = {$field_options|@count};
			if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 300) {literal}{
				{/literal}
				SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
				SUGAR.AutoComplete.{$ac_key}.queryDelay = 200;
				{literal}
			}
			{/literal}
			if(SUGAR.AutoComplete.{$ac_key}.numOptions >= 3000) {literal}{
				{/literal}
				SUGAR.AutoComplete.{$ac_key}.minQLen = 1;
				SUGAR.AutoComplete.{$ac_key}.queryDelay = 500;
				{literal}
			}
			{/literal}
				
				{literal}
	    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.plug(Y.Plugin.AutoComplete, {
	        activateFirstItem: true,
	        allowTrailingDelimiter: true,
			{/literal}
	        minQueryLength: SUGAR.AutoComplete.{$ac_key}.minQLen,
	        queryDelay: SUGAR.AutoComplete.{$ac_key}.queryDelay,
	        queryDelimiter: ',',
	        zIndex: 99999,

						{literal}
			source: SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.ds,
			
	        resultTextLocator: 'text',
	        resultHighlighter: 'phraseMatch',
	        resultFilters: 'phraseMatch',
	        // Chain together a startsWith filter followed by a custom result filter
	        // that only displays tags that haven't already been selected.
	        resultFilters: ['phraseMatch', function (query, results) {
		        // Split the current input value into an array based on comma delimiters.
	        	var selected = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
	        
	            // Convert the array into a hash for faster lookups.
	            selected = Y.Array.hash(selected);

	            // Filter out any results that are already selected, then return the
	            // array of filtered results.
	            return Y.Array.filter(results, function (result) {
	               return !selected.hasOwnProperty(result.text);
	            });
	        }]
	    });
		{/literal}{literal}
		if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		    // expand the dropdown options upon focus
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function () {
		        SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
		    });
		}

				    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden = function() {
				var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);

				var selectElem = document.getElementById("{/literal}{$fields.industry.name}{literal}");

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
					if (n=='')
						continue;
		    		if (!oTable.hasOwnProperty(n))
		    			fireEvent = true; //the options are different, fire the event
		    	}
		    	
		    	for (o in oTable){
		    		if (o=='')
		    			continue;
		    		if (!nTable.hasOwnProperty(o))
		    			fireEvent=true; //the options are different, fire the event
		    	}

		    	//if the selected options are different from before, fire the 'change' event
		    	if (fireEvent){
		    		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('change');
		    	}
		    };

		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText = function() {
		    	//get last option typed into the input widget
		    	SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set(SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value'));
				var index_array = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value').split(/\s*,\s*/);
				//create a string ret_string as a comma-delimited list of text from selectElem options.
				var selectElem = document.getElementById("{/literal}{$fields.industry.name}{literal}");
				var ret_array = [];

                if (selectElem==null || selectElem.options == null)
					return;

				for (i=0;i<selectElem.options.length;i++){
					if (selectElem.options[i].selected && selectElem.options[i].innerHTML!=''){
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
				ret_string = ret_array.concat(sorted_array).join(', ');
				if (ret_string.match(/^\s*$/))
					ret_string='';
				else
					ret_string+=', ';
				
				//update the input widget
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.set('value', ret_string);
		    };

		    function updateTextOnInterval(){
		    	if (document.activeElement != document.getElementById("{/literal}{$fields.industry.name}-input{literal}"))
		    		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    	setTimeout(updateTextOnInterval,100);
		    }

		    updateTextOnInterval();
		
					SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('click', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('click');
			});
			
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('dblclick', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('dblclick');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('focus', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('focus');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mouseup', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mouseup');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('mousedown', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('mousedown');
			});

			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function(e) {
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputHidden.simulate('blur');
			});
		
		SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.on('blur', function () {
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		});
	
	    // when they click on the arrow image, toggle the visibility of the options
	    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputImage.on('click', function () {
			if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
			}
			else{
				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.focus();
			}
	    });
	
		if({/literal}SUGAR.AutoComplete.{$ac_key}.minQLen{literal} == 0){
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
		      SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.sendRequest('');
		      SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.show();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    });
		} else {
		    // After a tag is selected, send an empty query to update the list of tags.
		    SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.ac.after('select', function () {
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateHidden();
			  SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.updateText();
		    });
		}
	});
	</script>
{/literal}
{/if}
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_ASSIGNED_TO">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO' module='Accounts'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="assigned_user_name" colspan='3' >
{counter name="panelFieldCount" print=false}

<input type="text" name="{$fields.assigned_user_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.assigned_user_name.name}" size="" value="{$fields.assigned_user_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.assigned_user_name.id_name}" 
id="{$fields.assigned_user_name.id_name}" 
value="{$fields.assigned_user_id.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.assigned_user_name.name}" id="btn_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_USERS_LABEL"}"
onclick='open_popup(
"{$fields.assigned_user_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"form_QuickCreate_Accounts","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.assigned_user_name.name}" id="btn_clr_{$fields.assigned_user_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.assigned_user_name.name}', '{$fields.assigned_user_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_USERS_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.assigned_user_name.name}']) != 'undefined'",
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
    var _form_id = '{$form_id}';
    {literal}
    SUGAR.util.doWhen(function(){
        _form_id = (_form_id == '') ? 'EditView' : _form_id;
        return document.getElementById(_form_id) != null;
    }, SUGAR.themes.actionMenu);
    {/literal}
</script>
{assign var='place' value="_FOOTER"} <!-- to be used for id for buttons with custom code in def files-->
<div class="buttons">
{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('form_QuickCreate_Accounts'); _form.action.value='Popup';return check_form('form_QuickCreate_Accounts')" type="submit" name="Accounts_popupcreate_save_button" id="Accounts_popupcreate_save_button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">{/if} 
<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="toggleDisplay('addform');return false;" name="Accounts_popup_cancel_button" type="submit"id="Accounts_popup_cancel_button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"> 
{if $showVCRControl}
<button type="button" id="save_and_continue" class="button saveAndContinue" title="{$app_strings.LBL_SAVE_AND_CONTINUE}" onClick="SUGAR.saveAndContinue(this);">
{$APP.LBL_SAVE_AND_CONTINUE}
</button>
{/if}
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=Accounts", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>
<script type="text/javascript">
YAHOO.util.Event.onContentReady("form_QuickCreate_Accounts",
    function () {ldelim} initEditView(document.forms.form_QuickCreate_Accounts) {rdelim});
//window.setTimeout(, 100);
window.onbeforeunload = function () {ldelim} return onUnloadEditView(); {rdelim};
// bug 55468 -- IE is too aggressive with onUnload event
if ($.browser.msie) {ldelim}
$(document).ready(function() {ldelim}
    $(".collapseLink,.expandLink").click(function (e) {ldelim} e.preventDefault(); {rdelim});
  {rdelim});
{rdelim}
</script>
{literal}
<script type="text/javascript">

    var selectTab = function(tab) {
        $('#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER').hide();
        $('#EditView_tabs div.tab-content div.tab-pane-NOBOOTSTRAPTOGGLER').eq(tab).show().addClass('active').addClass('in');
        $('#EditView_tabs div.panel-content div.panel').hide();
        $('#EditView_tabs div.panel-content div.panel.tab-panel-' + tab).show()
    };

    var selectTabOnError = function(tab) {
        selectTab(tab);
        $('#EditView_tabs ul.nav.nav-tabs li').removeClass('active');
        $('#EditView_tabs ul.nav.nav-tabs li a').css('color', '');

        $('#EditView_tabs ul.nav.nav-tabs li').eq(tab).find('a').first().css('color', 'red');
        $('#EditView_tabs ul.nav.nav-tabs li').eq(tab).addClass('active');

    };

    var selectTabOnErrorInputHandle = function(inputHandle) {
        var tab = $(inputHandle).closest('.tab-pane-NOBOOTSTRAPTOGGLER').attr('id').match(/^detailpanel_(.*)$/)[1];
        selectTabOnError(tab);
    };


    $(function(){
        $('#EditView_tabs ul.nav.nav-tabs li > a[data-toggle="tab"]').click(function(e){
            if(typeof $(this).parent().find('a').first().attr('id') != 'undefined') {
                var tab = parseInt($(this).parent().find('a').first().attr('id').match(/^tab(.)*$/)[1]);
                selectTab(tab);
            }
        });

        $('a[data-toggle="collapse-edit"]').click(function(e){
            if($(this).hasClass('collapsed')) {
              // Expand panel
                // Change style of .panel-header
                $(this).removeClass('collapsed');
                // Expand .panel-body
                $(this).parents('.panel').find('.panel-body').removeClass('in').addClass('in');
            } else {
              // Collapse panel
                // Change style of .panel-header
                $(this).addClass('collapsed');
                // Collapse .panel-body
                $(this).parents('.panel').find('.panel-body').removeClass('in').removeClass('in');
            }
        });
    });

    </script>
{/literal}{literal}
<script type="text/javascript">
addForm('form_QuickCreate_Accounts');addToValidate('form_QuickCreate_Accounts', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'date_entered_date', 'date', false,'تاريخ الإنشاء' );
addToValidate('form_QuickCreate_Accounts', 'date_modified_date', 'date', false,'تاريخ التعديل' );
addToValidate('form_QuickCreate_Accounts', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'account_type', 'enum', false,'{/literal}{sugar_translate label='LBL_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'industry[]', 'multienum', false,'{/literal}{sugar_translate label='LBL_INDUSTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'annual_revenue', 'varchar', false,'{/literal}{sugar_translate label='LBL_ANNUAL_REVENUE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'phone_fax', 'phone', false,'{/literal}{sugar_translate label='LBL_FAX' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_2' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_3' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_street_4', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STREET_4' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_CITY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_STATE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_POSTALCODE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_COUNTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'rating', 'varchar', false,'{/literal}{sugar_translate label='LBL_RATING' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'phone_office', 'phone', false,'{/literal}{sugar_translate label='LBL_PHONE_OFFICE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'phone_alternate', 'phone', false,'{/literal}{sugar_translate label='LBL_PHONE_ALT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'website', 'url', false,'{/literal}{sugar_translate label='LBL_WEBSITE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'ownership', 'enum', false,'{/literal}{sugar_translate label='LBL_OWNERSHIP' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'employees', 'enum', false,'{/literal}{sugar_translate label='LBL_EMPLOYEES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'ticker_symbol', 'varchar', false,'{/literal}{sugar_translate label='LBL_TICKER_SYMBOL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_street', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_street_2', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_2' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_street_3', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_3' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_street_4', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STREET_4' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_city', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_CITY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_state', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_STATE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_postalcode', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_POSTALCODE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_country', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_COUNTRY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'email1', 'varchar', false,'{/literal}{sugar_translate label='LBL_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'email_addresses_non_primary', 'email', false,'{/literal}{sugar_translate label='LBL_EMAIL_NON_PRIMARY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'parent_id', 'id', false,'{/literal}{sugar_translate label='LBL_PARENT_ACCOUNT_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'sic_code', 'varchar', false,'{/literal}{sugar_translate label='LBL_SIC_CODE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'parent_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MEMBER_OF' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'email_opt_out', 'bool', false,'{/literal}{sugar_translate label='LBL_EMAIL_OPT_OUT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'invalid_email', 'bool', false,'{/literal}{sugar_translate label='LBL_INVALID_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'email', 'email', false,'{/literal}{sugar_translate label='LBL_ANY_EMAIL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'campaign_id', 'id', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'campaign_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CAMPAIGN' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'jjwg_maps_lat_c', 'float', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_LAT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'jjwg_maps_geocode_status_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_GEOCODE_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'company_id_or_vat', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMPANY_ID_OR_VAT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'member_type', 'enum', false,'{/literal}{sugar_translate label='LBL_MEMBER_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'jjwg_maps_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_ADDRESS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'lead_source', 'enum', false,'{/literal}{sugar_translate label='LBL_LEAD_SOURCE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'other_company_number', 'varchar', false,'{/literal}{sugar_translate label='LBL_OTHER_COMPANY_NUMBER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'other', 'varchar', false,'{/literal}{sugar_translate label='LBL_OTHER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'billing_address_other', 'varchar', false,'{/literal}{sugar_translate label='LBL_BILLING_ADDRESS_OTHER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_other', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_OTHER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'total_salary_wage_bill', 'varchar', false,'{/literal}{sugar_translate label='LBL_TOTAL_SALARY_WAGE_BILL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_employees_at', 'varchar', false,'{/literal}{sugar_translate label='LBL_NR_EMPLOYEES_AT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'date_employees_at', 'date', false,'{/literal}{sugar_translate label='LBL_DATE_EMPLOYEES_AT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'association_member_type', 'enum', false,'{/literal}{sugar_translate label='LBL_ASSOCIATION_MEMBER_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'territorial', 'enum', false,'{/literal}{sugar_translate label='LBL_TERRITORIAL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_company_members', 'varchar', false,'{/literal}{sugar_translate label='LBL_NR_COMPANY_MEMBERS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'member_from', 'date', false,'{/literal}{sugar_translate label='LBL_MEMBER_FROM' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'member_till', 'date', false,'{/literal}{sugar_translate label='LBL_MEMBER_TILL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'membership_status', 'enum', false,'{/literal}{sugar_translate label='LBL_MEMBERSHIP_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'payment_status', 'varchar', false,'{/literal}{sugar_translate label='LBL_PAYMENT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'levels', 'enum', false,'{/literal}{sugar_translate label='LBL_LEVELS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'categories', 'enum', false,'{/literal}{sugar_translate label='LBL_CATEGORIES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'annual_nr_rates', 'int', false,'{/literal}{sugar_translate label='LBL_ANNUAL_NR_RATES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'subscription_fees', 'currency', false,'{/literal}{sugar_translate label='LBL_SUBSCRIPTION_FEES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'first_invoice_date', 'date', false,'{/literal}{sugar_translate label='LBL_FIRST_INVOICE_DATE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'last_invoice_date', 'date', false,'{/literal}{sugar_translate label='LBL_LAST_INVOICE_DATE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'subcategories[]', 'multienum', false,'{/literal}{sugar_translate label='LBL_SUBCATEGORIES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'five_main_operating_markets', 'multienum', false,'{/literal}{sugar_translate label='LBL_FIVE_MAIN_OPERATING_MARKETS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'target_exporting_markets', 'multienum', false,'{/literal}{sugar_translate label='LBL_TARGET_EXPORTING_MARKETS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'type_of_business', 'enum', false,'{/literal}{sugar_translate label='LBL_TYPE_OF_BUSINESS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'products_and_services', 'text', false,'{/literal}{sugar_translate label='LBL_PRODUCTS_AND_SERVICES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_directors', 'int', false,'{/literal}{sugar_translate label='LBL_NR_DIRECTORS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_permanent', 'int', false,'{/literal}{sugar_translate label='LBL_NR_PERMANENT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_casual', 'int', false,'{/literal}{sugar_translate label='LBL_NR_CASUAL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_seasonal', 'int', false,'{/literal}{sugar_translate label='LBL_NR_SEASONAL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_pobox_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_POBOX' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'shipping_address_region_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHIPPING_ADDRESS_REGION' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'committees[]', 'multienum', false,'{/literal}{sugar_translate label='LBL_COMMITTEES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'osy_account_code', 'int', true,'{/literal}{sugar_translate label='LBL_OSY_ACCOUNT_CODE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'e_invite_status_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_CONT_INVITE_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'event_status_name', 'enum', false,'{/literal}{sugar_translate label='LBL_LIST_INVITE_STATUS_EVENT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'event_invite_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_INVITE_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'e_accept_status_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_CONT_ACCEPT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'event_accept_status', 'enum', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS_EVENT' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'event_status_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_ACCEPT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'payment_status_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_PAYMENT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'osy_payment_status', 'enum', false,'{/literal}{sugar_translate label='LBL_LIST_PAYMENT_STATUS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'payment_status_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_PAYMENT_STATUS_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'cost_fields', 'relate', false,'{/literal}{sugar_translate label='LBL_COST' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'osy_cost', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_COST' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'cost_id', 'varchar', false,'{/literal}{sugar_translate label='LBL_LIST_COST_ID' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'panel_name', 'enum', false,'{/literal}{sugar_translate label='LBL_PANEL_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'osy_form_html_date_modified_c_date', 'date', false,'تحديث نموذج التاريخ' );
addToValidate('form_QuickCreate_Accounts', 'total_balance', 'currency', false,'{/literal}{sugar_translate label='LBL_TOTAL_BALANCE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'mark_as_closed', 'bool', false,'{/literal}{sugar_translate label='LBL_MARK_AS_CLOSED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'jjwg_maps_lng_c', 'float', false,'{/literal}{sugar_translate label='LBL_JJWG_MAPS_LNG' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'short_company_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_SHORT_COMPANY_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'type_activity_c[]', 'multienum', false,'{/literal}{sugar_translate label='LBL_TYPE_ACTIVITY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'id_card_number_c', 'int', false,'{/literal}{sugar_translate label='LBL_ID_CARD_NUMBER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'phone_mobile_c', 'phone', false,'{/literal}{sugar_translate label='LBL_PHONE_MOBILE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'front_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FRONT_ADDRESS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'no_guarantees_allowed_c', 'int', true,'{/literal}{sugar_translate label='LBL_NO_GUARANTEES_ALLOWED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'commercial_registration_no_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMMERCIAL_REGISTRATION_NO' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'gender_c', 'enum', false,'{/literal}{sugar_translate label='LBL_GENDER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'role_function_c', 'enum', false,'{/literal}{sugar_translate label='LBL_ROLE_FUNCTION' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'english_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ENGLISH_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'finders_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_FINDERS_NAME' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'commercial_name_arabic_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMMERCIAL_NAME_ARABIC' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'issue_authority_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ISSUE_AUTHORITY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'female_foreign_worker_c', 'int', false,'{/literal}{sugar_translate label='LBL_FEMALE_FOREIGN_WORKER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'member_number_system_c', 'int', false,'{/literal}{sugar_translate label='LBL_MEMBER_NUMBER_SYSTEM' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'was_detected_c', 'radioenum', false,'{/literal}{sugar_translate label='LBL_WAS_DETECTED' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'industry_description_c', 'text', false,'{/literal}{sugar_translate label='LBL_INDUSTRY_DESCRIPTION' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_female_employees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_NR_FEMALE_EMPLOYEES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'male_foreign_worker_c', 'int', false,'{/literal}{sugar_translate label='LBL_MALE_FOREIGN_WORKER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'capital_c', 'currency', false,'{/literal}{sugar_translate label='LBL_CAPITAL' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'work_field_c', 'enum', false,'{/literal}{sugar_translate label='LBL_WORK_FIELD' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'commercial_name_english_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_COMMERCIAL_NAME_ENGLISH' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'nr_male_employees_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_NR_MALE_EMPLOYEES' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'beside_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_BESIDE_ADDRESS' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'release_side_c', 'enum', false,'{/literal}{sugar_translate label='LBL_RELEASE_SIDE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'currency_id', 'currency_id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'other_information_about_staf_c', 'text', false,'{/literal}{sugar_translate label='LBL_OTHER_INFORMATION_ABOUT_STAF' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'issue_date_id_card_c', 'date', false,'{/literal}{sugar_translate label='LBL_ISSUE_DATE_ID_CARD' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'date_issuance_register_c', 'date', false,'{/literal}{sugar_translate label='LBL_DATE_ISSUANCE_REGISTER' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'registration_expiry_date_c', 'date', false,'{/literal}{sugar_translate label='LBL_REGISTRATION_EXPIRY_DATE' module='Accounts' for_js=true}{literal}' );
addToValidate('form_QuickCreate_Accounts', 'subscription_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_SUBSCRIPTION_TYPE' module='Accounts' for_js=true}{literal}' );
addToValidateBinaryDependency('form_QuickCreate_Accounts', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='Accounts' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='Accounts' for_js=true}{literal}', 'assigned_user_id' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['form_QuickCreate_Accounts_assigned_user_name']={"form":"form_QuickCreate_Accounts","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};</script>{/literal}
