<?php

class Mensagem extends AppModel {

    var $name = 'Mensagem';
    var $useTable = 'mensagens';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'UsuarioRecebida' => array(
            'className' => 'Usuario',
            'foreignKey' => 'de',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'UsuarioEnviada' => array(
            'className' => 'Usuario',
            'foreignKey' => 'para',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

?>