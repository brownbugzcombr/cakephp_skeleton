<?php
class EnqueteResposta extends AppModel {
	var $name = 'EnqueteResposta';

        

	var $belongsTo = array(
		'Enquete' => array(
			'className' => 'Enquete',
			'foreignKey' => 'enquete_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'EnqueteRespostaUsuario' => array(
			'className' => 'EnqueteRespostaUsuario',
			'foreignKey' => 'enquete_resposta_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>