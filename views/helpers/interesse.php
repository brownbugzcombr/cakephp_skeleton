<?php

Class InteresseHelper extends AppHelper{
	
	var $helpers = array('Form','Session');
	
	function check($campo,$usuarioId){		
		return false;
	}

	function checkbox($escolha,$listData,$options = array()){	
		foreach($listData as $item){
			if($item['id'] == $escolha) { $options['checked'] = 'checked'; }
		}
		$options['value'] = $escolha;
		echo $this->Form->hidden('Escolha.'.$escolha.'.usuario_id.',array('value'=>$this->Session->read('LoginUsuario.id')));
		return $this->Form->checkbox('Escolha.'.$escolha.'.escolha_id.',$options);
	}
}

?>