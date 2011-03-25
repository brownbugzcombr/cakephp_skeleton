<?php

class Comentario extends AppModel {

    var $name = 'Comentario';
    
    var $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'usuario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    

    //The Associations below have been created with all possible keys, those that are not needed can be removed
}

?>