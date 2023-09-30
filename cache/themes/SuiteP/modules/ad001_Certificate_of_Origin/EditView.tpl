

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
{$PAGINATION}
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
{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE">{/if} 
{if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=ad001_Certificate_of_Origin'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {/if}
{if $showVCRControl}
<button type="button" id="save_and_continue" class="button saveAndContinue" title="{$app_strings.LBL_SAVE_AND_CONTINUE}" onClick="SUGAR.saveAndContinue(this);">
{$APP.LBL_SAVE_AND_CONTINUE}
</button>
{/if}
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=ad001_Certificate_of_Origin", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</div>
</td>
<td align='right' class="edit-view-pagination-desktop-container">
<div class="edit-view-pagination edit-view-pagination-desktop">
{$PAGINATION}
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
{sugar_translate label='DEFAULT' module='ad001_Certificate_of_Origin'}
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
{capture name="label" assign="label"}{sugar_translate label='LBL_NAME' module='ad001_Certificate_of_Origin'}{/capture}
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
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_TYPE_OF_CERTIFICATE_ORIGIN">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE_OF_CERTIFICATE_ORIGIN' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

<span class="required">*</span>
{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="type_of_certificate_origin_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.type_of_certificate_origin_c.name}" 
id="{$fields.type_of_certificate_origin_c.name}" 
title=''       
>
{if isset($fields.type_of_certificate_origin_c.value) && $fields.type_of_certificate_origin_c.value != ''}
{html_options options=$fields.type_of_certificate_origin_c.options selected=$fields.type_of_certificate_origin_c.value}
{else}
{html_options options=$fields.type_of_certificate_origin_c.options selected=$fields.type_of_certificate_origin_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.type_of_certificate_origin_c.options }
{capture name="field_val"}{$fields.type_of_certificate_origin_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.type_of_certificate_origin_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.type_of_certificate_origin_c.name}" 
id="{$fields.type_of_certificate_origin_c.name}" 
title=''          
>
{if isset($fields.type_of_certificate_origin_c.value) && $fields.type_of_certificate_origin_c.value != ''}
{html_options options=$fields.type_of_certificate_origin_c.options selected=$fields.type_of_certificate_origin_c.value}
{else}
{html_options options=$fields.type_of_certificate_origin_c.options selected=$fields.type_of_certificate_origin_c.default}
{/if}
</select>
<input
id="{$fields.type_of_certificate_origin_c.name}-input"
name="{$fields.type_of_certificate_origin_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.type_of_certificate_origin_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.type_of_certificate_origin_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.type_of_certificate_origin_c.name}-input', '{$fields.type_of_certificate_origin_c.name}');sync_{$fields.type_of_certificate_origin_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.type_of_certificate_origin_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.type_of_certificate_origin_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.type_of_certificate_origin_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.type_of_certificate_origin_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.type_of_certificate_origin_c.name}{literal}");
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
			sync_{/literal}{$fields.type_of_certificate_origin_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.type_of_certificate_origin_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.type_of_certificate_origin_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.type_of_certificate_origin_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.type_of_certificate_origin_c.name}{literal}");
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
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_CERTIFICATE_NO">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_CERTIFICATE_NO' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

<span class="required">*</span>
{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="int" field="certificate_no_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.certificate_no_c.value) <= 0}
{assign var="value" value=$fields.certificate_no_c.default_value }
{else}
{assign var="value" value=$fields.certificate_no_c.value }
{/if}  
<input type='text' name='{$fields.certificate_no_c.name}' 
id='{$fields.certificate_no_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ASSIGNED_TO_NAME">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="assigned_user_name"  >
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
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}{/literal}, 
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
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-12 edit-view-row-item">


<div class="col-xs-12 col-sm-2 label" data-label="LBL_DESCRIPTION">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_DESCRIPTION' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="description" colspan='3' >
{counter name="panelFieldCount" print=false}

{if empty($fields.description.value)}
{assign var="value" value=$fields.description.default_value }
{else}
{assign var="value" value=$fields.description.value }
{/if}
<textarea  id='{$fields.description.name}' name='{$fields.description.name}'
rows="6"
cols="80"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL4' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_0" data-id="LBL_EDITVIEW_PANEL4">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_MEMBER_OR_POTENTIAL">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_MEMBER_OR_POTENTIAL' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="exporter_member_or_potential_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.exporter_member_or_potential_c.name}" 
id="{$fields.exporter_member_or_potential_c.name}" 
title=''       
>
{if isset($fields.exporter_member_or_potential_c.value) && $fields.exporter_member_or_potential_c.value != ''}
{html_options options=$fields.exporter_member_or_potential_c.options selected=$fields.exporter_member_or_potential_c.value}
{else}
{html_options options=$fields.exporter_member_or_potential_c.options selected=$fields.exporter_member_or_potential_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.exporter_member_or_potential_c.options }
{capture name="field_val"}{$fields.exporter_member_or_potential_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.exporter_member_or_potential_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.exporter_member_or_potential_c.name}" 
id="{$fields.exporter_member_or_potential_c.name}" 
title=''          
>
{if isset($fields.exporter_member_or_potential_c.value) && $fields.exporter_member_or_potential_c.value != ''}
{html_options options=$fields.exporter_member_or_potential_c.options selected=$fields.exporter_member_or_potential_c.value}
{else}
{html_options options=$fields.exporter_member_or_potential_c.options selected=$fields.exporter_member_or_potential_c.default}
{/if}
</select>
<input
id="{$fields.exporter_member_or_potential_c.name}-input"
name="{$fields.exporter_member_or_potential_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.exporter_member_or_potential_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.exporter_member_or_potential_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.exporter_member_or_potential_c.name}-input', '{$fields.exporter_member_or_potential_c.name}');sync_{$fields.exporter_member_or_potential_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.exporter_member_or_potential_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.exporter_member_or_potential_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.exporter_member_or_potential_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.exporter_member_or_potential_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.exporter_member_or_potential_c.name}{literal}");
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
			sync_{/literal}{$fields.exporter_member_or_potential_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.exporter_member_or_potential_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.exporter_member_or_potential_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.exporter_member_or_potential_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.exporter_member_or_potential_c.name}{literal}");
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


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORT_TYPE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORT_TYPE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="export_type_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.export_type_c.name}" 
id="{$fields.export_type_c.name}" 
title=''       
>
{if isset($fields.export_type_c.value) && $fields.export_type_c.value != ''}
{html_options options=$fields.export_type_c.options selected=$fields.export_type_c.value}
{else}
{html_options options=$fields.export_type_c.options selected=$fields.export_type_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.export_type_c.options }
{capture name="field_val"}{$fields.export_type_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.export_type_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.export_type_c.name}" 
id="{$fields.export_type_c.name}" 
title=''          
>
{if isset($fields.export_type_c.value) && $fields.export_type_c.value != ''}
{html_options options=$fields.export_type_c.options selected=$fields.export_type_c.value}
{else}
{html_options options=$fields.export_type_c.options selected=$fields.export_type_c.default}
{/if}
</select>
<input
id="{$fields.export_type_c.name}-input"
name="{$fields.export_type_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.export_type_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.export_type_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.export_type_c.name}-input', '{$fields.export_type_c.name}');sync_{$fields.export_type_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.export_type_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.export_type_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.export_type_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.export_type_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.export_type_c.name}{literal}");
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
			sync_{/literal}{$fields.export_type_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.export_type_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.export_type_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.export_type_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.export_type_c.name}{literal}");
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
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="accounts_ad001_certificate_of_origin_1_name"  >
{counter name="panelFieldCount" print=false}

<input type="text" name="{$fields.accounts_ad001_certificate_of_origin_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.accounts_ad001_certificate_of_origin_1_name.name}" size="" value="{$fields.accounts_ad001_certificate_of_origin_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.accounts_ad001_certificate_of_origin_1_name.id_name}" 
id="{$fields.accounts_ad001_certificate_of_origin_1_name.id_name}" 
value="{$fields.accounts_ad001_certificate_of_origin_1accounts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts_ad001_certificate_of_origin_1_name.name}" id="btn_{$fields.accounts_ad001_certificate_of_origin_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.accounts_ad001_certificate_of_origin_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"accounts_ad001_certificate_of_origin_1accounts_ida","name":"accounts_ad001_certificate_of_origin_1_name","billing_address_street":"exporter_address_c","billing_address_state":"exporter_address_state_c","billing_address_country":"exporter_address_country_c","billing_address_city":"exporter_address_city_c","billing_address_postalcode":"exporter_address_postalcode_c","english_name_c":"exporter_name_english_c","phone_office":"exporter_phone_office_c","phone_mobile_c":"exporter_phone_mobile_c","phone_fax":"exporter_phone_fax_c","email1":"exporter_email_address_c"}}{/literal}, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.accounts_ad001_certificate_of_origin_1_name.name}" id="btn_clr_{$fields.accounts_ad001_certificate_of_origin_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.accounts_ad001_certificate_of_origin_1_name.name}', '{$fields.accounts_ad001_certificate_of_origin_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.accounts_ad001_certificate_of_origin_1_name.name}']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="leads_ad001_certificate_of_origin_1_name"  >
{counter name="panelFieldCount" print=false}

<input type="text" name="{$fields.leads_ad001_certificate_of_origin_1_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.leads_ad001_certificate_of_origin_1_name.name}" size="" value="{$fields.leads_ad001_certificate_of_origin_1_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.leads_ad001_certificate_of_origin_1_name.id_name}" 
id="{$fields.leads_ad001_certificate_of_origin_1_name.id_name}" 
value="{$fields.leads_ad001_certificate_of_origin_1leads_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.leads_ad001_certificate_of_origin_1_name.name}" id="btn_{$fields.leads_ad001_certificate_of_origin_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.leads_ad001_certificate_of_origin_1_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"leads_ad001_certificate_of_origin_1leads_ida","name":"leads_ad001_certificate_of_origin_1_name","primary_address_street":"exporter_address_c","primary_address_state":"exporter_address_state_c","primary_address_region_c":"exporter_address_country_c","primary_address_city":"exporter_address_city_c","primary_address_postalcode":"exporter_address_postalcode_c","english_name_c":"exporter_name_english_c","phone_work":"exporter_phone_office_c","phone_mobile":"exporter_phone_mobile_c","phone_fax":"exporter_phone_fax_c","email1":"exporter_email_address_c"}}{/literal}, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.leads_ad001_certificate_of_origin_1_name.name}" id="btn_clr_{$fields.leads_ad001_certificate_of_origin_1_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.leads_ad001_certificate_of_origin_1_name.name}', '{$fields.leads_ad001_certificate_of_origin_1_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.leads_ad001_certificate_of_origin_1_name.name}']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_NAME_ENGLISH">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_NAME_ENGLISH' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_name_english_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_name_english_c.value) <= 0}
{assign var="value" value=$fields.exporter_name_english_c.default_value }
{else}
{assign var="value" value=$fields.exporter_name_english_c.value }
{/if}  
<input type='text' name='{$fields.exporter_name_english_c.name}' 
id='{$fields.exporter_name_english_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_PHONE_OFFICE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_PHONE_OFFICE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="exporter_phone_office_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_phone_office_c.value) <= 0}
{assign var="value" value=$fields.exporter_phone_office_c.default_value }
{else}
{assign var="value" value=$fields.exporter_phone_office_c.value }
{/if}  
<input type='text' name='{$fields.exporter_phone_office_c.name}' id='{$fields.exporter_phone_office_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_PHONE_MOBILE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_PHONE_MOBILE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="exporter_phone_mobile_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_phone_mobile_c.value) <= 0}
{assign var="value" value=$fields.exporter_phone_mobile_c.default_value }
{else}
{assign var="value" value=$fields.exporter_phone_mobile_c.value }
{/if}  
<input type='text' name='{$fields.exporter_phone_mobile_c.name}' id='{$fields.exporter_phone_mobile_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_PHONE_FAX">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_PHONE_FAX' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="exporter_phone_fax_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_phone_fax_c.value) <= 0}
{assign var="value" value=$fields.exporter_phone_fax_c.default_value }
{else}
{assign var="value" value=$fields.exporter_phone_fax_c.value }
{/if}  
<input type='text' name='{$fields.exporter_phone_fax_c.name}' id='{$fields.exporter_phone_fax_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_EMAIL_ADDRESS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_EMAIL_ADDRESS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_email_address_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_email_address_c.value) <= 0}
{assign var="value" value=$fields.exporter_email_address_c.default_value }
{else}
{assign var="value" value=$fields.exporter_email_address_c.value }
{/if}  
<input type='text' name='{$fields.exporter_email_address_c.name}' 
id='{$fields.exporter_email_address_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_ADDRESS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_ADDRESS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_address_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_address_c.value) <= 0}
{assign var="value" value=$fields.exporter_address_c.default_value }
{else}
{assign var="value" value=$fields.exporter_address_c.value }
{/if}  
<input type='text' name='{$fields.exporter_address_c.name}' 
id='{$fields.exporter_address_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_ADDRESS_STATE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_ADDRESS_STATE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_address_state_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_address_state_c.value) <= 0}
{assign var="value" value=$fields.exporter_address_state_c.default_value }
{else}
{assign var="value" value=$fields.exporter_address_state_c.value }
{/if}  
<input type='text' name='{$fields.exporter_address_state_c.name}' 
id='{$fields.exporter_address_state_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_ADDRESS_CITY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_ADDRESS_CITY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_address_city_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_address_city_c.value) <= 0}
{assign var="value" value=$fields.exporter_address_city_c.default_value }
{else}
{assign var="value" value=$fields.exporter_address_city_c.value }
{/if}  
<input type='text' name='{$fields.exporter_address_city_c.name}' 
id='{$fields.exporter_address_city_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_ADDRESS_COUNTRY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_ADDRESS_COUNTRY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_address_country_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_address_country_c.value) <= 0}
{assign var="value" value=$fields.exporter_address_country_c.default_value }
{else}
{assign var="value" value=$fields.exporter_address_country_c.value }
{/if}  
<input type='text' name='{$fields.exporter_address_country_c.name}' 
id='{$fields.exporter_address_country_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_EXPORTER_ADDRESS_POSTALCODE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_EXPORTER_ADDRESS_POSTALCODE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="exporter_address_postalcode_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.exporter_address_postalcode_c.value) <= 0}
{assign var="value" value=$fields.exporter_address_postalcode_c.default_value }
{else}
{assign var="value" value=$fields.exporter_address_postalcode_c.value }
{/if}  
<input type='text' name='{$fields.exporter_address_postalcode_c.name}' 
id='{$fields.exporter_address_postalcode_c.name}' size='30' 
maxlength='20' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL6' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_1" data-id="LBL_EDITVIEW_PANEL6">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_MEMBER_OR_POTEN">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_MEMBER_OR_POTEN' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="manufacturer_member_or_poten_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.manufacturer_member_or_poten_c.name}" 
id="{$fields.manufacturer_member_or_poten_c.name}" 
title=''       
>
{if isset($fields.manufacturer_member_or_poten_c.value) && $fields.manufacturer_member_or_poten_c.value != ''}
{html_options options=$fields.manufacturer_member_or_poten_c.options selected=$fields.manufacturer_member_or_poten_c.value}
{else}
{html_options options=$fields.manufacturer_member_or_poten_c.options selected=$fields.manufacturer_member_or_poten_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.manufacturer_member_or_poten_c.options }
{capture name="field_val"}{$fields.manufacturer_member_or_poten_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.manufacturer_member_or_poten_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.manufacturer_member_or_poten_c.name}" 
id="{$fields.manufacturer_member_or_poten_c.name}" 
title=''          
>
{if isset($fields.manufacturer_member_or_poten_c.value) && $fields.manufacturer_member_or_poten_c.value != ''}
{html_options options=$fields.manufacturer_member_or_poten_c.options selected=$fields.manufacturer_member_or_poten_c.value}
{else}
{html_options options=$fields.manufacturer_member_or_poten_c.options selected=$fields.manufacturer_member_or_poten_c.default}
{/if}
</select>
<input
id="{$fields.manufacturer_member_or_poten_c.name}-input"
name="{$fields.manufacturer_member_or_poten_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.manufacturer_member_or_poten_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.manufacturer_member_or_poten_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.manufacturer_member_or_poten_c.name}-input', '{$fields.manufacturer_member_or_poten_c.name}');sync_{$fields.manufacturer_member_or_poten_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.manufacturer_member_or_poten_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.manufacturer_member_or_poten_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.manufacturer_member_or_poten_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal}");
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
			sync_{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.manufacturer_member_or_poten_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.manufacturer_member_or_poten_c.name}{literal}");
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


<div class="col-xs-12 col-sm-4 label" data-label="LBL_COUNTRY_OF_ORIGIN">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_COUNTRY_OF_ORIGIN' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="country_of_origin_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.country_of_origin_c.name}" 
id="{$fields.country_of_origin_c.name}" 
title=''       
>
{if isset($fields.country_of_origin_c.value) && $fields.country_of_origin_c.value != ''}
{html_options options=$fields.country_of_origin_c.options selected=$fields.country_of_origin_c.value}
{else}
{html_options options=$fields.country_of_origin_c.options selected=$fields.country_of_origin_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.country_of_origin_c.options }
{capture name="field_val"}{$fields.country_of_origin_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.country_of_origin_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.country_of_origin_c.name}" 
id="{$fields.country_of_origin_c.name}" 
title=''          
>
{if isset($fields.country_of_origin_c.value) && $fields.country_of_origin_c.value != ''}
{html_options options=$fields.country_of_origin_c.options selected=$fields.country_of_origin_c.value}
{else}
{html_options options=$fields.country_of_origin_c.options selected=$fields.country_of_origin_c.default}
{/if}
</select>
<input
id="{$fields.country_of_origin_c.name}-input"
name="{$fields.country_of_origin_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.country_of_origin_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.country_of_origin_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.country_of_origin_c.name}-input', '{$fields.country_of_origin_c.name}');sync_{$fields.country_of_origin_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.country_of_origin_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.country_of_origin_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.country_of_origin_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.country_of_origin_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.country_of_origin_c.name}{literal}");
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
			sync_{/literal}{$fields.country_of_origin_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.country_of_origin_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.country_of_origin_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.country_of_origin_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.country_of_origin_c.name}{literal}");
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
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="accounts_ad001_certificate_of_origin_2_name"  >
{counter name="panelFieldCount" print=false}

<input type="text" name="{$fields.accounts_ad001_certificate_of_origin_2_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.accounts_ad001_certificate_of_origin_2_name.name}" size="" value="{$fields.accounts_ad001_certificate_of_origin_2_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.accounts_ad001_certificate_of_origin_2_name.id_name}" 
id="{$fields.accounts_ad001_certificate_of_origin_2_name.id_name}" 
value="{$fields.accounts_ad001_certificate_of_origin_2accounts_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.accounts_ad001_certificate_of_origin_2_name.name}" id="btn_{$fields.accounts_ad001_certificate_of_origin_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_ACCESSKEY_SELECT_ACCOUNTS_LABEL"}"
onclick='open_popup(
"{$fields.accounts_ad001_certificate_of_origin_2_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"accounts_ad001_certificate_of_origin_2accounts_ida","name":"accounts_ad001_certificate_of_origin_2_name","billing_address_street":"manufacturer_addr_c","billing_address_state":"manufacturer_addr_state_c","billing_address_country":"manufacturer_addr_country_c","billing_address_city":"manufacturer_addr_city_c","billing_address_postalcode":"manufacturer_addr_postalcode_c","english_name_c":"manufacturer_name_english_c","phone_office":"manufacturer_phone_office_c","phone_mobile_c":"manufacturer_phone_mobile_c","phone_fax":"manufacturer_phone_fax_c","email1":"manufacturer_email_address_c"}}{/literal}, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.accounts_ad001_certificate_of_origin_2_name.name}" id="btn_clr_{$fields.accounts_ad001_certificate_of_origin_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.accounts_ad001_certificate_of_origin_2_name.name}', '{$fields.accounts_ad001_certificate_of_origin_2_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_ACCOUNTS_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.accounts_ad001_certificate_of_origin_2_name.name}']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="relate" field="leads_ad001_certificate_of_origin_2_name"  >
{counter name="panelFieldCount" print=false}

<input type="text" name="{$fields.leads_ad001_certificate_of_origin_2_name.name}" class="sqsEnabled" tabindex="0" id="{$fields.leads_ad001_certificate_of_origin_2_name.name}" size="" value="{$fields.leads_ad001_certificate_of_origin_2_name.value}" title='' autocomplete="off"  	 >
<input type="hidden" name="{$fields.leads_ad001_certificate_of_origin_2_name.id_name}" 
id="{$fields.leads_ad001_certificate_of_origin_2_name.id_name}" 
value="{$fields.leads_ad001_certificate_of_origin_2leads_ida.value}">
<span class="id-ff multiple">
<button type="button" name="btn_{$fields.leads_ad001_certificate_of_origin_2_name.name}" id="btn_{$fields.leads_ad001_certificate_of_origin_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_SELECT_BUTTON_TITLE"}" class="button firstChild" value="{sugar_translate label="LBL_SELECT_BUTTON_LABEL"}"
onclick='open_popup(
"{$fields.leads_ad001_certificate_of_origin_2_name.module}", 
600, 
400, 
"", 
true, 
false, 
{literal}{"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"leads_ad001_certificate_of_origin_2leads_ida","name":"leads_ad001_certificate_of_origin_2_name","primary_address_street":"manufacturer_addr_c","primary_address_state":"manufacturer_addr_state_c","primary_address_region_c":"manufacturer_addr_country_c","primary_address_city":"manufacturer_addr_city_c","primary_address_postalcode":"manufacturer_addr_postalcode_c","english_name_c":"manufacturer_name_english_c","phone_work":"manufacturer_phone_office_c","phone_mobile":"manufacturer_phone_mobile_c","phone_fax":"manufacturer_phone_fax_c","email1":"manufacturer_email_address_c"}}{/literal}, 
"single", 
true
);' ><span class="suitepicon suitepicon-action-select"></span></button><button type="button" name="btn_clr_{$fields.leads_ad001_certificate_of_origin_2_name.name}" id="btn_clr_{$fields.leads_ad001_certificate_of_origin_2_name.name}" tabindex="0" title="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_TITLE"}"  class="button lastChild"
onclick="SUGAR.clearRelateField(this.form, '{$fields.leads_ad001_certificate_of_origin_2_name.name}', '{$fields.leads_ad001_certificate_of_origin_2_name.id_name}');"  value="{sugar_translate label="LBL_ACCESSKEY_CLEAR_RELATE_LABEL"}" ><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
<script type="text/javascript">
SUGAR.util.doWhen(
		"typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{$form_name}_{$fields.leads_ad001_certificate_of_origin_2_name.name}']) != 'undefined'",
		enableQS
);
</script>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_NAME_ENGLISH">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_NAME_ENGLISH' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_name_english_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_name_english_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_name_english_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_name_english_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_name_english_c.name}' 
id='{$fields.manufacturer_name_english_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_PHONE_OFFICE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_PHONE_OFFICE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="manufacturer_phone_office_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_phone_office_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_phone_office_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_phone_office_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_phone_office_c.name}' id='{$fields.manufacturer_phone_office_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_PHONE_MOBILE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_PHONE_MOBILE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="manufacturer_phone_mobile_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_phone_mobile_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_phone_mobile_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_phone_mobile_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_phone_mobile_c.name}' id='{$fields.manufacturer_phone_mobile_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_PHONE_FAX">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_PHONE_FAX' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="phone" field="manufacturer_phone_fax_c"  class="phone">
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_phone_fax_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_phone_fax_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_phone_fax_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_phone_fax_c.name}' id='{$fields.manufacturer_phone_fax_c.name}' size='30' maxlength='255' value='{$value}' title='' tabindex='0'	  class="phone" >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_EMAIL_ADDRESS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_EMAIL_ADDRESS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_email_address_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_email_address_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_email_address_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_email_address_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_email_address_c.name}' 
id='{$fields.manufacturer_email_address_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_ADDR">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_ADDR' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_addr_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_addr_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_addr_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_addr_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_addr_c.name}' 
id='{$fields.manufacturer_addr_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_ADDR_STATE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_ADDR_STATE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_addr_state_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_addr_state_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_addr_state_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_addr_state_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_addr_state_c.name}' 
id='{$fields.manufacturer_addr_state_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_ADDR_CITY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_ADDR_CITY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_addr_city_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_addr_city_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_addr_city_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_addr_city_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_addr_city_c.name}' 
id='{$fields.manufacturer_addr_city_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_ADDR_COUNTRY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_ADDR_COUNTRY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_addr_country_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_addr_country_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_addr_country_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_addr_country_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_addr_country_c.name}' 
id='{$fields.manufacturer_addr_country_c.name}' size='30' 
maxlength='100' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MANUFACTURER_ADDR_POSTALCODE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MANUFACTURER_ADDR_POSTALCODE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="manufacturer_addr_postalcode_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.manufacturer_addr_postalcode_c.value) <= 0}
{assign var="value" value=$fields.manufacturer_addr_postalcode_c.default_value }
{else}
{assign var="value" value=$fields.manufacturer_addr_postalcode_c.value }
{/if}  
<input type='text' name='{$fields.manufacturer_addr_postalcode_c.name}' 
id='{$fields.manufacturer_addr_postalcode_c.name}' size='30' 
maxlength='20' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL3' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_2" data-id="LBL_EDITVIEW_PANEL3">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_IMPORTER_NAME">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPORTER_NAME' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="importer_name_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.importer_name_c.value) <= 0}
{assign var="value" value=$fields.importer_name_c.default_value }
{else}
{assign var="value" value=$fields.importer_name_c.value }
{/if}  
<input type='text' name='{$fields.importer_name_c.name}' 
id='{$fields.importer_name_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_IMPORTER_NAME_ENGLISH">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPORTER_NAME_ENGLISH' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="importer_name_english_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.importer_name_english_c.value) <= 0}
{assign var="value" value=$fields.importer_name_english_c.default_value }
{else}
{assign var="value" value=$fields.importer_name_english_c.value }
{/if}  
<input type='text' name='{$fields.importer_name_english_c.name}' 
id='{$fields.importer_name_english_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_IMPORTER_ADDRESS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPORTER_ADDRESS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="importer_address_c"  >
{counter name="panelFieldCount" print=false}

{if empty($fields.importer_address_c.value)}
{assign var="value" value=$fields.importer_address_c.default_value }
{else}
{assign var="value" value=$fields.importer_address_c.value }
{/if}
<textarea  id='{$fields.importer_address_c.name}' name='{$fields.importer_address_c.name}'
rows="4"
cols="20"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_IMPORTING_COUNTRY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_IMPORTING_COUNTRY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="importing_country_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.importing_country_c.name}" 
id="{$fields.importing_country_c.name}" 
title=''       
>
{if isset($fields.importing_country_c.value) && $fields.importing_country_c.value != ''}
{html_options options=$fields.importing_country_c.options selected=$fields.importing_country_c.value}
{else}
{html_options options=$fields.importing_country_c.options selected=$fields.importing_country_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.importing_country_c.options }
{capture name="field_val"}{$fields.importing_country_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.importing_country_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.importing_country_c.name}" 
id="{$fields.importing_country_c.name}" 
title=''          
>
{if isset($fields.importing_country_c.value) && $fields.importing_country_c.value != ''}
{html_options options=$fields.importing_country_c.options selected=$fields.importing_country_c.value}
{else}
{html_options options=$fields.importing_country_c.options selected=$fields.importing_country_c.default}
{/if}
</select>
<input
id="{$fields.importing_country_c.name}-input"
name="{$fields.importing_country_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.importing_country_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.importing_country_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.importing_country_c.name}-input', '{$fields.importing_country_c.name}');sync_{$fields.importing_country_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.importing_country_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.importing_country_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.importing_country_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.importing_country_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.importing_country_c.name}{literal}");
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
			sync_{/literal}{$fields.importing_country_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.importing_country_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.importing_country_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.importing_country_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.importing_country_c.name}{literal}");
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
<div class="clear"></div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL7' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_3" data-id="LBL_EDITVIEW_PANEL7">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_CONSIGNEE_NAME">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_CONSIGNEE_NAME' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="consignee_name_c"  >
{counter name="panelFieldCount" print=false}

{if empty($fields.consignee_name_c.value)}
{assign var="value" value=$fields.consignee_name_c.default_value }
{else}
{assign var="value" value=$fields.consignee_name_c.value }
{/if}
<textarea  id='{$fields.consignee_name_c.name}' name='{$fields.consignee_name_c.name}'
rows="4"
cols="20"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_SHIPPING_METHOD">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_SHIPPING_METHOD' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="enum" field="shipping_method_c"  >
{counter name="panelFieldCount" print=false}

{if !isset($config.enable_autocomplete) || $config.enable_autocomplete==false}
<select name="{$fields.shipping_method_c.name}" 
id="{$fields.shipping_method_c.name}" 
title=''       
>
{if isset($fields.shipping_method_c.value) && $fields.shipping_method_c.value != ''}
{html_options options=$fields.shipping_method_c.options selected=$fields.shipping_method_c.value}
{else}
{html_options options=$fields.shipping_method_c.options selected=$fields.shipping_method_c.default}
{/if}
</select>
{else}
{assign var="field_options" value=$fields.shipping_method_c.options }
{capture name="field_val"}{$fields.shipping_method_c.value}{/capture}
{assign var="field_val" value=$smarty.capture.field_val}
{capture name="ac_key"}{$fields.shipping_method_c.name}{/capture}
{assign var="ac_key" value=$smarty.capture.ac_key}
<select style='display:none' name="{$fields.shipping_method_c.name}" 
id="{$fields.shipping_method_c.name}" 
title=''          
>
{if isset($fields.shipping_method_c.value) && $fields.shipping_method_c.value != ''}
{html_options options=$fields.shipping_method_c.options selected=$fields.shipping_method_c.value}
{else}
{html_options options=$fields.shipping_method_c.options selected=$fields.shipping_method_c.default}
{/if}
</select>
<input
id="{$fields.shipping_method_c.name}-input"
name="{$fields.shipping_method_c.name}-input"
size="30"
value="{$field_val|lookup:$field_options}"
type="text" style="vertical-align: top;">
<span class="id-ff multiple">
<button type="button"><img src="{sugar_getimagepath file="id-ff-down.png"}" id="{$fields.shipping_method_c.name}-image"></button><button type="button"
id="btn-clear-{$fields.shipping_method_c.name}-input"
title="Clear"
onclick="SUGAR.clearRelateField(this.form, '{$fields.shipping_method_c.name}-input', '{$fields.shipping_method_c.name}');sync_{$fields.shipping_method_c.name}()"><span class="suitepicon suitepicon-action-clear"></span></button>
</span>
{literal}
<script>
	SUGAR.AutoComplete.{/literal}{$ac_key}{literal} = [];
	{/literal}

			{literal}
		(function (){
			var selectElem = document.getElementById("{/literal}{$fields.shipping_method_c.name}{literal}");
			
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
			
	SUGAR.AutoComplete.{$ac_key}.inputNode = Y.one('#{$fields.shipping_method_c.name}-input');
	SUGAR.AutoComplete.{$ac_key}.inputImage = Y.one('#{$fields.shipping_method_c.name}-image');
	SUGAR.AutoComplete.{$ac_key}.inputHidden = Y.one('#{$fields.shipping_method_c.name}');
	
			{literal}
			function SyncToHidden(selectme){
				var selectElem = document.getElementById("{/literal}{$fields.shipping_method_c.name}{literal}");
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
			sync_{/literal}{$fields.shipping_method_c.name}{literal} = function(){
				SyncToHidden();
			}
			function syncFromHiddenToWidget(){

				var selectElem = document.getElementById("{/literal}{$fields.shipping_method_c.name}{literal}");

				//if select no longer on page, kill timer
				if (selectElem==null || selectElem.options == null)
					return;

				var currentvalue = SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.get('value');

				SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.simulate('keyup');

				for (i=0;i<selectElem.options.length;i++){

					if (selectElem.options[i].value==selectElem.value && document.activeElement != document.getElementById('{/literal}{$fields.shipping_method_c.name}-input{literal}'))
						SUGAR.AutoComplete.{/literal}{$ac_key}{literal}.inputNode.set('value',selectElem.options[i].innerHTML);
				}
			}

            YAHOO.util.Event.onAvailable("{/literal}{$fields.shipping_method_c.name}{literal}", syncFromHiddenToWidget);
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
			var selectElem = document.getElementById("{/literal}{$fields.shipping_method_c.name}{literal}");
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
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_VESSEL_NO">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_VESSEL_NO' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="vessel_no_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.vessel_no_c.value) <= 0}
{assign var="value" value=$fields.vessel_no_c.default_value }
{else}
{assign var="value" value=$fields.vessel_no_c.value }
{/if}  
<input type='text' name='{$fields.vessel_no_c.name}' 
id='{$fields.vessel_no_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_DEPARTURE_DATE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_DEPARTURE_DATE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="date" field="departure_date_c"  >
{counter name="panelFieldCount" print=false}

<span class="dateTime">
{assign var=date_value value=$fields.departure_date_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.departure_date_c.name}" id="{$fields.departure_date_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
<button type="button" id="{$fields.departure_date_c.name}_trigger" class="btn btn-danger" onclick="return false;"><span class="suitepicon suitepicon-module-calendar" alt="{$APP.LBL_ENTER_DATE}"></span></button>
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.departure_date_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.departure_date_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_PORT_OF_LOADING">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_PORT_OF_LOADING' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="port_of_loading_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.port_of_loading_c.value) <= 0}
{assign var="value" value=$fields.port_of_loading_c.default_value }
{else}
{assign var="value" value=$fields.port_of_loading_c.value }
{/if}  
<input type='text' name='{$fields.port_of_loading_c.name}' 
id='{$fields.port_of_loading_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_PORT_OF_DISCHARGE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_PORT_OF_DISCHARGE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="port_of_discharge_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.port_of_discharge_c.value) <= 0}
{assign var="value" value=$fields.port_of_discharge_c.default_value }
{else}
{assign var="value" value=$fields.port_of_discharge_c.value }
{/if}  
<input type='text' name='{$fields.port_of_discharge_c.name}' 
id='{$fields.port_of_discharge_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL2' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_4" data-id="LBL_EDITVIEW_PANEL2">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_INVOICE_NUMBER">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_INVOICE_NUMBER' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="int" field="invoice_number_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.invoice_number_c.value) <= 0}
{assign var="value" value=$fields.invoice_number_c.default_value }
{else}
{assign var="value" value=$fields.invoice_number_c.value }
{/if}  
<input type='text' name='{$fields.invoice_number_c.name}' 
id='{$fields.invoice_number_c.name}' size='30' maxlength='255' value='{sugar_number_format precision=0 var=$value}' title='' tabindex='0'    >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_INVOICE_DATE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_INVOICE_DATE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="date" field="invoice_date_c"  >
{counter name="panelFieldCount" print=false}

<span class="dateTime">
{assign var=date_value value=$fields.invoice_date_c.value }
<input class="date_input" autocomplete="off" type="text" name="{$fields.invoice_date_c.name}" id="{$fields.invoice_date_c.name}" value="{$date_value}" title=''  tabindex='0'    size="11" maxlength="10" >
<button type="button" id="{$fields.invoice_date_c.name}_trigger" class="btn btn-danger" onclick="return false;"><span class="suitepicon suitepicon-module-calendar" alt="{$APP.LBL_ENTER_DATE}"></span></button>
</span>
<script type="text/javascript">
Calendar.setup ({ldelim}
inputField : "{$fields.invoice_date_c.name}",
form : "EditView",
ifFormat : "{$CALENDAR_FORMAT}",
daFormat : "{$CALENDAR_FORMAT}",
button : "{$fields.invoice_date_c.name}_trigger",
singleClick : true,
dateStr : "{$date_value}",
startWeekday: {$CALENDAR_FDOW|default:'0'},
step : 1,
weekNumbers:false
{rdelim}
);
</script>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_INVOICE_PAYMENT">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_INVOICE_PAYMENT' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="currency" field="invoice_payment_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.invoice_payment_c.value) <= 0}
{assign var="value" value=$fields.invoice_payment_c.default_value }
{else}
{assign var="value" value=$fields.invoice_payment_c.value }
{/if}  
<input type='text' name='{$fields.invoice_payment_c.name}' 
id='{$fields.invoice_payment_c.name}' size='30' maxlength='26' value='{sugar_number_format var=$value}' title='' tabindex='0'
>
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_CURRENCY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_CURRENCY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="currency_id" field="currency_id"  >
{counter name="panelFieldCount" print=false}
<span id='currency_id_span'>
{$fields.currency_id.value}</span>
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>
</div>                    </div>
</div>
</div>




<div class="panel panel-default">
<div class="panel-heading ">
<a class="" role="button" data-toggle="collapse-edit" aria-expanded="false">
<div class="col-xs-10 col-sm-11 col-md-11">
{sugar_translate label='LBL_EDITVIEW_PANEL1' module='ad001_Certificate_of_Origin'}
</div>
</a>
</div>
<div class="panel-body panel-collapse collapse in panelContainer" id="detailpanel_5" data-id="LBL_EDITVIEW_PANEL1">
<div class="tab-content">
<!-- tab_panel_content.tpl -->
<div class="row edit-view-row">



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_TYPE_OF_GOODS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_TYPE_OF_GOODS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="type_of_goods_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.type_of_goods_c.value) <= 0}
{assign var="value" value=$fields.type_of_goods_c.default_value }
{else}
{assign var="value" value=$fields.type_of_goods_c.value }
{/if}  
<input type='text' name='{$fields.type_of_goods_c.name}' 
id='{$fields.type_of_goods_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ENGLISH_TYPE_OF_GOODS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ENGLISH_TYPE_OF_GOODS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="english_type_of_goods_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.english_type_of_goods_c.value) <= 0}
{assign var="value" value=$fields.english_type_of_goods_c.default_value }
{else}
{assign var="value" value=$fields.english_type_of_goods_c.value }
{/if}  
<input type='text' name='{$fields.english_type_of_goods_c.name}' 
id='{$fields.english_type_of_goods_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_QTY">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_QTY' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="qty_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.qty_c.value) <= 0}
{assign var="value" value=$fields.qty_c.default_value }
{else}
{assign var="value" value=$fields.qty_c.value }
{/if}  
<input type='text' name='{$fields.qty_c.name}' 
id='{$fields.qty_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ITEM_NUMBER">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ITEM_NUMBER' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="item_number_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.item_number_c.value) <= 0}
{assign var="value" value=$fields.item_number_c.default_value }
{else}
{assign var="value" value=$fields.item_number_c.value }
{/if}  
<input type='text' name='{$fields.item_number_c.name}' 
id='{$fields.item_number_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_NUMBER_OF_PARCELS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_NUMBER_OF_PARCELS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="number_of_parcels_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.number_of_parcels_c.value) <= 0}
{assign var="value" value=$fields.number_of_parcels_c.default_value }
{else}
{assign var="value" value=$fields.number_of_parcels_c.value }
{/if}  
<input type='text' name='{$fields.number_of_parcels_c.name}' 
id='{$fields.number_of_parcels_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ENGLISH_NUMBER_OF_PARCELS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ENGLISH_NUMBER_OF_PARCELS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="english_number_of_parcels_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.english_number_of_parcels_c.value) <= 0}
{assign var="value" value=$fields.english_number_of_parcels_c.default_value }
{else}
{assign var="value" value=$fields.english_number_of_parcels_c.value }
{/if}  
<input type='text' name='{$fields.english_number_of_parcels_c.name}' 
id='{$fields.english_number_of_parcels_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_MARKS_AND_NUMBERS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_MARKS_AND_NUMBERS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="marks_and_numbers_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.marks_and_numbers_c.value) <= 0}
{assign var="value" value=$fields.marks_and_numbers_c.default_value }
{else}
{assign var="value" value=$fields.marks_and_numbers_c.value }
{/if}  
<input type='text' name='{$fields.marks_and_numbers_c.name}' 
id='{$fields.marks_and_numbers_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ENGLISH_MARKS_AND_NUMBERS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ENGLISH_MARKS_AND_NUMBERS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="english_marks_and_numbers_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.english_marks_and_numbers_c.value) <= 0}
{assign var="value" value=$fields.english_marks_and_numbers_c.default_value }
{else}
{assign var="value" value=$fields.english_marks_and_numbers_c.value }
{/if}  
<input type='text' name='{$fields.english_marks_and_numbers_c.name}' 
id='{$fields.english_marks_and_numbers_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_GROSS_WEIGHT">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_GROSS_WEIGHT' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="gross_weight_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.gross_weight_c.value) <= 0}
{assign var="value" value=$fields.gross_weight_c.default_value }
{else}
{assign var="value" value=$fields.gross_weight_c.value }
{/if}  
<input type='text' name='{$fields.gross_weight_c.name}' 
id='{$fields.gross_weight_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ENGLISH_GROSS_WEIGHT">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ENGLISH_GROSS_WEIGHT' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="english_gross_weight_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.english_gross_weight_c.value) <= 0}
{assign var="value" value=$fields.english_gross_weight_c.default_value }
{else}
{assign var="value" value=$fields.english_gross_weight_c.value }
{/if}  
<input type='text' name='{$fields.english_gross_weight_c.name}' 
id='{$fields.english_gross_weight_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_UNIT_WEIGHT">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_UNIT_WEIGHT' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="unit_weight_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.unit_weight_c.value) <= 0}
{assign var="value" value=$fields.unit_weight_c.default_value }
{else}
{assign var="value" value=$fields.unit_weight_c.value }
{/if}  
<input type='text' name='{$fields.unit_weight_c.name}' 
id='{$fields.unit_weight_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_HS_CODE">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_HS_CODE' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="hs_code_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.hs_code_c.value) <= 0}
{assign var="value" value=$fields.hs_code_c.default_value }
{else}
{assign var="value" value=$fields.hs_code_c.value }
{/if}  
<input type='text' name='{$fields.hs_code_c.name}' 
id='{$fields.hs_code_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_NET_WEIGHT">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_NET_WEIGHT' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="net_weight_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.net_weight_c.value) <= 0}
{assign var="value" value=$fields.net_weight_c.default_value }
{else}
{assign var="value" value=$fields.net_weight_c.value }
{/if}  
<input type='text' name='{$fields.net_weight_c.name}' 
id='{$fields.net_weight_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ORIGIN_CRITERION">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ORIGIN_CRITERION' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="varchar" field="origin_criterion_c"  >
{counter name="panelFieldCount" print=false}

{if strlen($fields.origin_criterion_c.value) <= 0}
{assign var="value" value=$fields.origin_criterion_c.default_value }
{else}
{assign var="value" value=$fields.origin_criterion_c.value }
{/if}  
<input type='text' name='{$fields.origin_criterion_c.name}' 
id='{$fields.origin_criterion_c.name}' size='30' 
maxlength='255' 
value='{$value}' title=''      >
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
<div class="clear"></div>



<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_REVIEWS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_REVIEWS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="reviews_c"  >
{counter name="panelFieldCount" print=false}

{if empty($fields.reviews_c.value)}
{assign var="value" value=$fields.reviews_c.default_value }
{else}
{assign var="value" value=$fields.reviews_c.value }
{/if}
<textarea  id='{$fields.reviews_c.name}' name='{$fields.reviews_c.name}'
rows="4"
cols="20"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</div>

<!-- [/hide] -->
</div>


<div class="col-xs-12 col-sm-6 edit-view-row-item">


<div class="col-xs-12 col-sm-4 label" data-label="LBL_ENGLISH_REVIEWS">

{minify}
{capture name="label" assign="label"}{sugar_translate label='LBL_ENGLISH_REVIEWS' module='ad001_Certificate_of_Origin'}{/capture}
{$label|strip_semicolon}:

{/minify}
</div>

<div class="col-xs-12 col-sm-8 edit-view-field " type="text" field="english_reviews_c"  >
{counter name="panelFieldCount" print=false}

{if empty($fields.english_reviews_c.value)}
{assign var="value" value=$fields.english_reviews_c.default_value }
{else}
{assign var="value" value=$fields.english_reviews_c.value }
{/if}
<textarea  id='{$fields.english_reviews_c.name}' name='{$fields.english_reviews_c.name}'
rows="4"
cols="20"
title='' tabindex="0" 
 >{$value}</textarea>
{literal}{/literal}
</div>

<!-- [/hide] -->
</div>
<div class="clear"></div>
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
{if $bean->aclAccess("save")}<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button primary" onclick="var _form = document.getElementById('EditView'); {if $isDuplicate}_form.return_id.value=''; {/if}_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);return false;" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}" id="SAVE">{/if} 
{if !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($smarty.request.return_id))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" type="button" id="CANCEL"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && !empty($fields.id.value))}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif !empty($smarty.request.return_action) && ($smarty.request.return_action == "DetailView" && empty($fields.id.value)) && empty($smarty.request.return_id)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=ListView&module={$smarty.request.return_module|escape:"url"}&record={$fields.id.value}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif !empty($smarty.request.return_action) && !empty($smarty.request.return_module)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action={$smarty.request.return_action}&module={$smarty.request.return_module|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {elseif empty($smarty.request.return_action) || empty($smarty.request.return_id) && !empty($fields.id.value)}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module=ad001_Certificate_of_Origin'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {else}<input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" onclick="SUGAR.ajaxUI.loadContent('index.php?action=index&module={$smarty.request.return_module|escape:"url"}&record={$smarty.request.return_id|escape:"url"}'); return false;" type="button" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}" id="CANCEL"> {/if}
{if $showVCRControl}
<button type="button" id="save_and_continue" class="button saveAndContinue" title="{$app_strings.LBL_SAVE_AND_CONTINUE}" onClick="SUGAR.saveAndContinue(this);">
{$APP.LBL_SAVE_AND_CONTINUE}
</button>
{/if}
{if $bean->aclAccess("detail")}{if !empty($fields.id.value) && $isAuditEnabled}<input id="btn_view_change_log" title="{$APP.LNK_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$fields.id.value}&module_name=ad001_Certificate_of_Origin", true, false,  {ldelim} "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] {rdelim} ); return false;' type="button" value="{$APP.LNK_VIEW_CHANGE_LOG}">{/if}{/if}
</div>
</form>
{$set_focus_block}
<script>SUGAR.util.doWhen("document.getElementById('EditView') != null",
        function(){ldelim}SUGAR.util.buildAccessKeyLabels();{rdelim});
</script>
<script type="text/javascript">
YAHOO.util.Event.onContentReady("EditView",
    function () {ldelim} initEditView(document.forms.EditView) {rdelim});
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
addForm('EditView');addToValidate('EditView', 'name', 'name', true,'{/literal}{sugar_translate label='LBL_NAME' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'date_entered_date', 'date', false,'تاريخ الإنشاء' );
addToValidate('EditView', 'date_modified_date', 'date', false,'تاريخ التعديل' );
addToValidate('EditView', 'modified_user_id', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_MODIFIED' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'modified_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_MODIFIED_NAME' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'created_by', 'assigned_user_name', false,'{/literal}{sugar_translate label='LBL_CREATED' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'created_by_name', 'relate', false,'{/literal}{sugar_translate label='LBL_CREATED' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'description', 'text', false,'{/literal}{sugar_translate label='LBL_DESCRIPTION' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'deleted', 'bool', false,'{/literal}{sugar_translate label='LBL_DELETED' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_id', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_ID' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'assigned_user_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'leads_ad001_certificate_of_origin_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'leads_ad001_certificate_of_origin_2_name', 'relate', false,'{/literal}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'accounts_ad001_certificate_of_origin_2_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'accounts_ad001_certificate_of_origin_1_name', 'relate', false,'{/literal}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'country_of_origin_c', 'enum', false,'{/literal}{sugar_translate label='LBL_COUNTRY_OF_ORIGIN' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'vessel_no_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_VESSEL_NO' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'consignee_name_c', 'text', false,'{/literal}{sugar_translate label='LBL_CONSIGNEE_NAME' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'export_type_c', 'enum', false,'{/literal}{sugar_translate label='LBL_EXPORT_TYPE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_name_english_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_NAME_ENGLISH' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'type_of_goods_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_TYPE_OF_GOODS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_addr_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_ADDR' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_number_c', 'int', false,'{/literal}{sugar_translate label='LBL_INVOICE_NUMBER' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'item_number_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ITEM_NUMBER' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'importer_name_english_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_IMPORTER_NAME_ENGLISH' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_payment_c', 'currency', false,'{/literal}{sugar_translate label='LBL_INVOICE_PAYMENT' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'origin_criterion_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ORIGIN_CRITERION' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_address_postalcode_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_ADDRESS_POSTALCODE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'english_gross_weight_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ENGLISH_GROSS_WEIGHT' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_member_or_potential_c', 'enum', false,'{/literal}{sugar_translate label='LBL_EXPORTER_MEMBER_OR_POTENTIAL' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_ADDRESS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'net_weight_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_NET_WEIGHT' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'port_of_loading_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_PORT_OF_LOADING' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_name_english_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_NAME_ENGLISH' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_address_country_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_ADDRESS_COUNTRY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_addr_postalcode_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_ADDR_POSTALCODE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'hs_code_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_HS_CODE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'marks_and_numbers_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MARKS_AND_NUMBERS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_phone_office_c', 'phone', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_PHONE_OFFICE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'number_of_parcels_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_NUMBER_OF_PARCELS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_address_city_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_ADDRESS_CITY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_addr_state_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_ADDR_STATE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_email_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_EMAIL_ADDRESS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_phone_fax_c', 'phone', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_PHONE_FAX' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_member_or_poten_c', 'enum', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_MEMBER_OR_POTEN' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'importer_name_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_IMPORTER_NAME' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'gross_weight_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_GROSS_WEIGHT' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'invoice_date_c', 'date', false,'{/literal}{sugar_translate label='LBL_INVOICE_DATE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_addr_city_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_ADDR_CITY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'importer_address_c', 'text', false,'{/literal}{sugar_translate label='LBL_IMPORTER_ADDRESS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'certificate_no_c', 'int', true,'{/literal}{sugar_translate label='LBL_CERTIFICATE_NO' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'english_marks_and_numbers_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ENGLISH_MARKS_AND_NUMBERS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'english_reviews_c', 'text', false,'{/literal}{sugar_translate label='LBL_ENGLISH_REVIEWS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'reviews_c', 'text', false,'{/literal}{sugar_translate label='LBL_REVIEWS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'unit_weight_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_UNIT_WEIGHT' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_phone_fax_c', 'phone', false,'{/literal}{sugar_translate label='LBL_EXPORTER_PHONE_FAX' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'qty_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_QTY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_email_address_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_EMAIL_ADDRESS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_phone_mobile_c', 'phone', false,'{/literal}{sugar_translate label='LBL_EXPORTER_PHONE_MOBILE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'port_of_discharge_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_PORT_OF_DISCHARGE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_addr_country_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_ADDR_COUNTRY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'importing_country_c', 'enum', false,'{/literal}{sugar_translate label='LBL_IMPORTING_COUNTRY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'english_type_of_goods_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ENGLISH_TYPE_OF_GOODS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'currency_id', 'currency_id', false,'{/literal}{sugar_translate label='LBL_CURRENCY' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'departure_date_c', 'date', false,'{/literal}{sugar_translate label='LBL_DEPARTURE_DATE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'english_number_of_parcels_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_ENGLISH_NUMBER_OF_PARCELS' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_address_state_c', 'varchar', false,'{/literal}{sugar_translate label='LBL_EXPORTER_ADDRESS_STATE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'shipping_method_c', 'enum', false,'{/literal}{sugar_translate label='LBL_SHIPPING_METHOD' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'manufacturer_phone_mobile_c', 'phone', false,'{/literal}{sugar_translate label='LBL_MANUFACTURER_PHONE_MOBILE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'type_of_certificate_origin_c', 'enum', true,'{/literal}{sugar_translate label='LBL_TYPE_OF_CERTIFICATE_ORIGIN' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidate('EditView', 'exporter_phone_office_c', 'phone', false,'{/literal}{sugar_translate label='LBL_EXPORTER_PHONE_OFFICE' module='ad001_Certificate_of_Origin' for_js=true}{literal}' );
addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='ad001_Certificate_of_Origin' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ASSIGNED_TO' module='ad001_Certificate_of_Origin' for_js=true}{literal}', 'assigned_user_id' );
addToValidateBinaryDependency('EditView', 'leads_ad001_certificate_of_origin_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='ad001_Certificate_of_Origin' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}', 'leads_ad001_certificate_of_origin_1leads_ida' );
addToValidateBinaryDependency('EditView', 'leads_ad001_certificate_of_origin_2_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='ad001_Certificate_of_Origin' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}', 'leads_ad001_certificate_of_origin_2leads_ida' );
addToValidateBinaryDependency('EditView', 'accounts_ad001_certificate_of_origin_2_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='ad001_Certificate_of_Origin' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}', 'accounts_ad001_certificate_of_origin_2accounts_ida' );
addToValidateBinaryDependency('EditView', 'accounts_ad001_certificate_of_origin_1_name', 'alpha', false,'{/literal}{sugar_translate label='ERR_SQS_NO_MATCH_FIELD' module='ad001_Certificate_of_Origin' for_js=true}{literal}: {/literal}{sugar_translate label='LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE' module='ad001_Certificate_of_Origin' for_js=true}{literal}', 'accounts_ad001_certificate_of_origin_1accounts_ida' );
</script><script language="javascript">if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};sqs_objects['EditView_accounts_ad001_certificate_of_origin_1_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_accounts_ad001_certificate_of_origin_1_name","accounts_ad001_certificate_of_origin_1accounts_ida"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_ad001_certificate_of_origin_1accounts_ida"],"order":"name","limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};sqs_objects['EditView_leads_ad001_certificate_of_origin_1_name']={"form":"EditView","method":"query","modules":["Leads"],"group":"or","field_list":["name","id"],"populate_list":["leads_ad001_certificate_of_origin_1_name","leads_ad001_certificate_of_origin_1leads_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};sqs_objects['EditView_accounts_ad001_certificate_of_origin_2_name']={"form":"EditView","method":"query","modules":["Accounts"],"group":"or","field_list":["name","id"],"populate_list":["EditView_accounts_ad001_certificate_of_origin_2_name","accounts_ad001_certificate_of_origin_2accounts_ida"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"required_list":["accounts_ad001_certificate_of_origin_2accounts_ida"],"order":"name","limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};sqs_objects['EditView_leads_ad001_certificate_of_origin_2_name']={"form":"EditView","method":"query","modules":["Leads"],"group":"or","field_list":["name","id"],"populate_list":["leads_ad001_certificate_of_origin_2_name","leads_ad001_certificate_of_origin_2leads_ida"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0637\u0627\u0628\u0642"};</script>{/literal}
