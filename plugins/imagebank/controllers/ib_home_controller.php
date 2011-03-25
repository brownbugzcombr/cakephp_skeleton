<?php
/**
 * Home Controller for ImageBank
 * @package ImageBank
 * @category Controllers
 * @author Gregory Brown <brown@bugz.com.br>
 */
class IbHomeController extends ImagebankAppController {

    var $uses = "IbImagem";
    var $name = 'IbHome';
    var $layout='default';
    function index() {
        echo APP.WEBROOT_DIR.DS.'upload/img/';
    }
    
    function upload(){
        
    }
    function createimage_step2() {       
        if (!empty($this->data)) {
            $uploaded = $this->JqImgcrop->uploadImage($this->data['imagem'], '/upload/img/', 'prefix_');
            $this->set('uploaded', $uploaded);
        }
    }
    function createimage_step3(){
        /*
         * $thumb_width, $x1, $y1, $x2, $y2, $w, $h, $thumbLocation, $imageLocation 
         * $thumb_width is the width of your thumbnail, 
         * $x1, $y1, $x2, $y2, $w and $h are including the crop parameters, 
         * $thumbLocation the location where you want to save your thumb, 
         * and $imageLocation the location of the sourceimage.
         */
        $this->JqImgcrop->cropImage(
                151, 
                $this->data['YourModel']['x1'], $this->data['YourModel']['y1'], 
                $this->data['YourModel']['x2'], $this->data['YourModel']['y2'], 
                $this->data['YourModel']['w'], $this->data['YourModel']['h'], 
                $this->data['YourModel']['imagePath'], 
                $this->data['YourModel']['imagePath']);
    }
}

?>