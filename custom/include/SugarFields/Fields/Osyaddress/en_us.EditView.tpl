{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
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

*}
<script type="text/javascript" src='{sugar_getjspath file="custom/include/SugarFields/Fields/Osyaddress/SugarFieldOsyaddress.js"}'></script>
{{assign var="key" value=$displayParams.key|upper}}
{{assign var="other" value=$displayParams.key|cat:'_address_other'}}
{{assign var="street" value=$displayParams.key|cat:'_address_street'}}
{{assign var="istat" value=$displayParams.key|cat:'_address_istat'}}
{{assign var="city" value=$displayParams.key|cat:'_address_city'}}
{{assign var="state" value=$displayParams.key|cat:'_address_state'}}

{{assign var="country" value=$displayParams.key|cat:'_address_region_c'}}
{{assign var="postalcode" value=$displayParams.key|cat:'_address_pobox_c'}}

{{assign var="postalcode" value=$displayParams.key|cat:'_address_postalcode'}}
<fieldset id='{{$key}}_address_fieldset'>
    <legend>{sugar_translate label='LBL_{{$key}}_ADDRESS' module='{{$module}}'}</legend>
    <table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">

        <tr>
            <td valign="top" id="{{$street}}_label" width='25%' scope='row' >
                <label for='{{$street}}'>{sugar_translate label='LBL_{{$street|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$street}}.required || {{if $street|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td width="*">
                {{if $displayParams.maxlength}}
                <textarea id="{{$street}}" name="{{$street}}" maxlength="{{$displayParams.maxlength}}" rows="{{$displayParams.rows|default:4}}" cols="{{$displayParams.cols|default:60}}" {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}} {{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}}  >{$fields.{{$street}}.value}</textarea>
                {{else}}
                <textarea id="{{$street}}" name="{{$street}}" rows="{{$displayParams.rows|default:4}}" cols="{{$displayParams.cols|default:60}}"  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}} {{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}}  >{$fields.{{$street}}.value}</textarea>
                {{/if}}
            </td>
        </tr>

        <tr>
            {*
            <td id="{{$istat}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >
            <label for='{{$istat}}'>{sugar_translate label='LBL_BILLING_ADDRESS_ISTAT' module='{{$module}}'}:</label>
            {if $fields.{{$istat}}.required || {{if $istat|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
            <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
            {/if}
            </td>
            <td>
            <input type="text" name="{{$istat}}" id="{{$istat}}" size="{{$displayParams.size|default:30}}" {{if !empty($vardef.len)}}maxlength='{{$vardef.len}}'{{/if}} value='{$fields.{{$istat}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}>
            <input type="button" tabindex="33" onclick="open_popup(&quot;Popups&quot;, 600, 400, &quot;&amp;module_name=Opportunities&quot;, true, false, &quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&amp;table=codici_istat&amp;colonna_provincia=LBL_PROVINCIA&amp;colonna_comune=LBL_COMUNE&amp;colonna_codice=LBL_CODICE_ISTAT&amp;ritorno_codice={{$istat}}&amp;ritorno_provincia={{$state}}&amp;ritorno_comune={{$city}}&amp;ritorno_cap={{$postalcode}}&amp;titolo=LBL_TITOLO_CODICI_ISTAT&amp;ricerca_provincia&amp;lbl_ricerca_provincia=LBL_PROVINCIA&amp;ricerca_comune&amp;lbl_ricerca_comune=LBL_COMUNE&quot;);" name="btn1" value="Seleziona" class="button" accesskey="T" title="Seleziona [Alt+T]">
            </td>
            </tr>
            *}

        <tr>

            <td id="{{$city}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >
                <label for='{{$city}}'>{sugar_translate label='LBL_{{$city|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$city}}.required || {{if $city|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="{{$city}}" id="{{$city}}" size="{{$displayParams.size|default:30}}" {{if !empty($vardef.len)}}maxlength='{{$vardef.len}}'{{/if}} value='{$fields.{{$city}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}>
            </td>
        </tr>

        <tr>
            <td id="{{$state}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >
                <label for='{{$state}}'>{sugar_translate label='LBL_{{$state|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$state}}.required || {{if $state|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="{{$state}}" id="{{$state}}" size="{{$displayParams.size|default:30}}" {{if !empty($vardef.len)}}maxlength='{{$vardef.len}}'{{/if}} value='{$fields.{{$state}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}>
            </td>
        </tr>

        <tr>

            <td id="{{$postalcode}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >

                <label for='{{$postalcode}}'>{sugar_translate label='LBL_{{$postalcode|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$postalcode}}.required || {{if $postalcode|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="{{$postalcode}}" id="{{$postalcode}}" size="{{$displayParams.size|default:30}}" {{if !empty($vardef.len)}}maxlength='{{$vardef.len}}'{{/if}} value='{$fields.{{$postalcode}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}>
            </td>
        </tr>

        <tr>

            <td id="{{$country}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >

                <label for='{{$country}}'>{sugar_translate label='LBL_{{$country|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$country}}.required || {{if $country|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="{{$country}}" id="{{$country}}" size="{{$displayParams.size|default:30}}" {{if !empty($vardef.len)}}maxlength='{{$vardef.len}}'{{/if}} value='{$fields.{{$country}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}>
            </td>
        </tr>

        <tr>
            <td valign="top" id="{{$other}}_label" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope='row' >
                <label for="{{$other}}">{sugar_translate label='LBL_{{$other|upper}}' module='{{$module}}'}:</label>
                {if $fields.{{$other}}.required || {{if $other|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                {{if $displayParams.maxlength}}
                <textarea id="{{$other}}" name="{{$other}}" maxlength="{{$displayParams.maxlength}}" rows="{{$displayParams.rows|default:4}}" cols="{{$displayParams.cols|default:60}}" {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}} {{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}}  >{$fields.{{$other}}.value}</textarea>
                {{else}}
                <textarea id="{{$other}}" name="{{$other}}" rows="{{$displayParams.rows|default:4}}" cols="{{$displayParams.cols|default:60}}"  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}} {{if !empty($displayParams.accesskey)}} accesskey='{{$displayParams.accesskey}}' {{/if}}  >{$fields.{{$other}}.value}</textarea>
                {{/if}}
            </td>
        </tr>

        {{if $displayParams.copy}}
        <tr>
            <td scope='row' NOWRAP>
                {sugar_translate label='LBL_COPY_ADDRESS_FROM_LEFT' module=''}:
            </td>
            <td>
                <input id="{{$displayParams.key}}_checkbox" name="{{$displayParams.key}}_checkbox" type="checkbox" onclick="{{$displayParams.key}}_address.syncFields();">
            </td>
        </tr>
        {{else}}
        <tr>
            <td colspan='2' NOWRAP>&nbsp;</td>
        </tr>
        {{/if}}
    </table>
</fieldset>
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
        {{$displayParams.key}}_address = new SUGAR.AddressField("{{$displayParams.key}}_checkbox",'{{$displayParams.copy}}', '{{$displayParams.key}}');
        {rdelim});
</script>