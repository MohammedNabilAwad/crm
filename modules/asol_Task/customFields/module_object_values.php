<?php

global $mod_strings;
echo '
	<table id="module_values_Table" class="edit view">
	
		<tr>
	
			<th nowrap="nowrap" scope="col">
				<div align="left" width="100%" style="white-space: nowrap;">
				'.$mod_strings['LBL_ASOL_DATABASE_FIELD'].'
				</div>
			</th>
	
			<th nowrap="nowrap" scope="col">
				<div align="left" width="100%" style="white-space: nowrap;">
				'.$mod_strings['LBL_ASOL_VALUE'].'
				</div>
			</th>
	
			<th nowrap="nowrap" scope="col" colspan="2">
				 <input type="hidden" id="uniqueRowIndexes" value="0">
			</th>
	
		</tr>
		
	</table>
';

?>