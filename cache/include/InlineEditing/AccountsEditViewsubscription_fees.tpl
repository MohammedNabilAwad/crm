
{if strlen($fields.subscription_fees.value) <= 0}
{assign var="value" value=$fields.subscription_fees.default_value }
{else}
{assign var="value" value=$fields.subscription_fees.value }
{/if}  
<input type='text' name='{$fields.subscription_fees.name}' 
id='{$fields.subscription_fees.name}' size='30'  value='{sugar_number_format var=$value}' title='' tabindex='1'
 >