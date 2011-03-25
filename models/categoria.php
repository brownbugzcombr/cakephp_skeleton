<?php

class Categoria extends AppModel {

    var $name = 'Categoria';
    
    var $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'categoria_id',
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
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
}

?>