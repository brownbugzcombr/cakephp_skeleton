<?PHP
class UsuarioEscolha extends AppModel {
	var $name = 'UsuarioEscolha';
	
	var $balongsTo = array(
		'Usuario' => array(			
            'foreignKey' => 'usuario_id'
		),
		'Escolha' => array(
			'foreignKey' => 'escolha_id'
		)
	);
		
}

?>