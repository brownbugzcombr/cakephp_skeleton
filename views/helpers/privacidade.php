<?php

Class PrivacidadeHelper extends AppHelper{
	
	var $helpers = array('Form','Session');
	
	function check($campo,$usuarioId){
		$UsuarioPrivacidade = ClassRegistry::init('UsuarioPrivacidade');
		$privacidade = $UsuarioPrivacidade->find('first',array(
									'conditions'=>array(
										'campo'=>$campo,
										'usuario_id'=>$usuarioId										
									)
								));
		if($privacidade['UsuarioPrivacidade']['mostrar'] == 1) {
			return true;
		}

		
		return false;
	}

	function checkbox($campo,$options){
		$UsuarioPrivacidade = ClassRegistry::init('UsuarioPrivacidade');
		$privacidade = $UsuarioPrivacidade->find('first',array(
									'conditions'=>array(
										'campo'=>$campo,
										'usuario_id'=>$this->Session->read('LoginUsuario.id'),
										'mostrar' => 1
									)
								));

		if($privacidade) { $options['checked'] = 'checked'; }
		return $this->Form->checkbox('UsuarioPrivacidade.campo.'.$campo,$options);
	}
}

?>