<?php

class Pergunta extends AppModel {

    var $name = 'Pergunta';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'Pesquisa' => array(
            'className' => 'Pesquisa',
            'foreignKey' => 'pesquisa_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'Resposta' => array(
            'className' => 'Resposta',
            'foreignKey' => 'pergunta_id',
            'dependent' => false,
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