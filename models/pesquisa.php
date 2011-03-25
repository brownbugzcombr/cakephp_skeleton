<?php

class Pesquisa extends AppModel {

    var $name = 'Pesquisa';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $hasMany = array(
        'Pergunta' => array(
            'className' => 'Pergunta',
            'foreignKey' => 'pesquisa_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'RespostaCultural' => array(
            'className' => 'RespostaCultural',
            'foreignKey' => 'pesquisa_id',
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