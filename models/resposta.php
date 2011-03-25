<?php

class Resposta extends AppModel {

    var $name = 'Resposta';
    var $displayField = 'respota';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'Pergunta' => array(
            'className' => 'Pergunta',
            'foreignKey' => 'pergunta_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasAndBelongsToMany = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'joinTable' => 'usuario_respostas',
            'foreignKey' => 'resposta_id',
            'associationForeignKey' => 'usuario_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

}

?>