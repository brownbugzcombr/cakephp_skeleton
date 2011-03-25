<?php

class ImagebankAppController extends AppController {

    var $helpers = array('imagebank.Cropimage');
    var $components = array('JqImgcrop');
    var $allows = array(
        'ib_home' => array('index', 'createimage_step2', 'createimage_step3', 'upload')
    );

}

?>