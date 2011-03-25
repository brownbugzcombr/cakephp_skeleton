<?php
/**
 * Model for post
 * @package Skeleton
 * @category Models
 * @author Gregory Brown <brown@bugz.com.br>
 */
class Post extends AppModel {
    /**
     *
     * @var String $name 
     */
    var $name = 'Post';
    /**
     *
     * @var string $displayField Used to determine wich table field to display 
     */
    var $displayField = 'titulo';
    /**
     *
     * @var array $validate Validation rules 
     */
    var $validate = array(
        'titulo' => array(
            'rule' => 'notEmpty',
            'message' => 'Favor preencher o título do post'
        ),
        'img_destaque' => array(
            'Empty' => array(
                'check' => false
            ),
            'InvalidExt' => array(
                'message' => 'Extensão de arquivo não permitida'
            ),
            'InvalidMime' => array(
                'message' => 'Tipo de arquivo não permitido'
            )
        ),
        'img_home' => array(
            'Empty' => array(
                'check' => false
            ),
            'InvalidExt' => array(
                'message' => 'Extensão de arquivo não permitida'
            ),
            'InvalidMime' => array(
                'message' => 'Tipo de arquivo não permitido'
            )
        )
    );
    /**
     *
     * @var array $hasAndBelongsToMany Assosciation Rules
     */
    var $hasAndBelongsToMany = array(
        'Tag' => array(
            'className' => 'Tag',
            'joinTable' => 'posts_tags',
            'foreignKey' => 'post_id',
            'associationForeignKey' => 'tag_id',
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
    /**
     *
     * @var array $hasAndBelongsToMany Assosciation Rules
     */
    var $belongsTo = array(
        'Categoria' => array(
            'className' => 'Categoria',
            'foreignKey' => 'categoria_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    /**
     *
     * @var array $hasAndBelongsToMany Assosciation Rules
     */
    var $hasMany = array(
        'Comentario' => array(
            'className' => 'Comentario',
            'foreignKey' => 'post_id',
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
    /**
     *
     * @var array $hasAndBelongsToMany Assosciation Rules
     */
    var $actsAs = array(
        'MeioUpload' => array(
            'img_destaque' => array(
                'dir' => 'upload{DS}posts{DS}destaque{DS}',
                'max_size' => '700 Kb',
                'createDirectory' => true,
                'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
                'allowed_ext' => array('.jpg', '.jpeg', '.png', 'gif'),
                'thumbsizes' => array(
                    'vejaTambem' => array('width' => 107, 'height' => 64),
                ),
            ),
            'img_home' => array(
                'dir' => 'upload{DS}posts{DS}home{DS}',
                'max_size' => '700 kb',
                'createDirectory' => true,
                'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
                'allowed_ext' => array('.jpg', '.jpeg', '.png', 'gif'),
                'thumbsizes' => array(
                    'use' => array('width' => 480, 'height' => 190),
                ),
                'default' => '_none.png'
            )
            ));

}

?>