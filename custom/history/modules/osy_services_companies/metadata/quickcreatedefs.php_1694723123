<?php
$module_name = 'osy_services_companies';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'form' => 
      array (
        'hidden' => 
        array (
          0 => '<input type="hidden" name="account_name" id="account_name" value="">',
          1 => '<input type="hidden" name="account_id" id="account_id" value="">',
          2 => '<input type="hidden" name="lead_name" id="lead_name" value="">',
          3 => '<input type="hidden" name="lead_id" id="lead_id" value="">',
        ),
      ),
      'javascript' => '
		{literal}
			<script type="text/javascript">
					$(document).ready(function(){
						// modulo corrente di cui stiamo visualizzando il dettaglio
						var sCurrentModule = $(\'input[name="module"]\', $(\'#formDetailView\')).val();
						
						// in questo oggetto definire per ogni modulo un sottoggetto che mappa
						// per ogni campo hidden il suo valore.
						var oPopulateFields = {
							"Leads" : { 
								lead_id : $(\'input[name="record"]\', $(\'#formDetailView\')).val(),
								lead_name : $(\'#account_name\').html(),
							},
							"Accounts" : {
								account_id : $(\'input[name="record"]\', $(\'#formDetailView\')).val(),
								account_name : $(\'#name\').html(),
							},
						};

						for (var sModule in oPopulateFields){
							if(sModule == sCurrentModule){
								for (var sourceFieldId in oPopulateFields[sModule]){
									$(\'#\'+sourceFieldId).val(oPopulateFields[sModule][sourceFieldId]);
								}
							}	
						}
					}); 
			</script>
		{/literal}
	',
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'subject',
            'label' => 'LBL_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'subject_description',
            'label' => 'LBL_SUBJECT_DESCRIPTION',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'mode_of_intervention',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_MODE_OF_INTERVENTION',
          ),
          1 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
    ),
  ),
);
;
?>
