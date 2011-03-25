<?php

class Enquete extends AppModel {

    var $name = 'Enquete';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    
    var $hasMany = array(
        'EnqueteResposta' => array(
            'className' => 'EnqueteResposta',
            'foreignKey' => 'enquete_id',
            'dependent' => true,
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