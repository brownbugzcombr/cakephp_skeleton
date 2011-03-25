<?php

Class RamoAtividade extends AppModel{
	var $useTable = 'ramos_atividade';
	var $displayField = 'desc';
	
	var $hasMany = array(
		'Usuario' => array(
			'foreignKey' => 'ramo'
		)
	);
}

?>