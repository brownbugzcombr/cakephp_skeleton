<?php

class EnqueteRespostaUsuario extends AppModel {

    var $name = 'EnqueteRespostaUsuario';
    //The Associations below have been created with all possible keys, those that are not needed can be removed.
    var $virtualFields = array(
        'contagem' => 'count(id)'
    );
    var $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'usuario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'EnqueteResposta' => array(
            'className' => 'EnqueteResposta',
            'foreignKey' => 'enquete_resposta_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

?>