<?php

class Tvantagem extends AppModel {

    var $name = 'tvantagem';
    var $displayField = 'nome';
    var $useTable = 'tvantagens';
    var $actsAs = array(
        'MeioUpload' => array(
            'logotipo' => array(
                'dir' => 'upload{DS}tvantagem{DS}',
                'createDirectory' => true,
                'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
                'allowed_ext' => array('.jpg', '.jpeg', '.png', 'gif'),
                'thumbsizes' => array(
                    'home' => array('width' => 93, 'height' => 44),
                ),
            )
            ));

}

?>