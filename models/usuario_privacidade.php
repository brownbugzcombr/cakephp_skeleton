<?php

Class UsuarioPrivacidade extends AppModel{
	var $name = 'UsuarioPrivacidade';
	var $useTable = 'usuario_privacidades';
	
	var $belongsTo = array(
		'Usuario'
	);
	
	
	function salvaPrivacidade($usuarioId,$data){		
		
		//debug(Set::extract('/UsuarioPrivacidade/campo',$privacidades));
		foreach($data as $key=>$d){
			$newdata['UsuarioPrivacidade']['usuario_id'] 	= $usuarioId;
			$newdata['UsuarioPrivacidade']['campo']			= $key;
			
			if($privacidadeId = $this->getPrivacidadeId($key,$usuarioId)){
				$newdata['UsuarioPrivacidade']['id'] = $privacidadeId;
			}
			$newdata['UsuarioPrivacidade']['mostrar'] = $d;			
			
			$this->create();
			$this->save($newdata);
			$newdata = '';
		}
	}
	
	function getPrivacidadeId($campo,$usuarioId){
		 $privacidades = $this->find('first',array(
			'conditions'=> array(
				'usuario_id' => $usuarioId,
		 		'campo' => $campo
			),			
			'recursive'=>-1
		));
		if($privacidades){			
			return $privacidades['UsuarioPrivacidade']['id'];
		}
	}
}

?>