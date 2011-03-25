<?php

class UsuarioResposta extends AppModel {

    var $name = 'UsuarioResposta';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'usuario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Pergunta' => array(
            'className' => 'Pergunta',
            'foreignKey' => 'pergunta_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Resposta' => array(
            'className' => 'Resposta',
            'foreignKey' => 'resposta_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}

?>