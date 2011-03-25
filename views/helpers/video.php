<?php

class VideoHelper extends Helper {

    var $helpers = Array('Html', 'Javascript');

    function load($text) {
        $url = '';
        if(preg_match('/url=".+?"/', $text, $url)){
            $url = str_replace('url="', '', $url[0]);
            $url = str_replace('"', '', $url);
            $videocode =  '<p id="flash_video"></p><script type="text/javascript">var flashvars = { file:"'.$url.'", autostart:"false", dock:"false" };var params = { allowfullscreen:"true", allowscriptaccess:"always" };var attributes = { id:"player1", name:"player1" };swfobject.embedSWF("/jwplayer/player.swf","flash_video","480","270","9.0.115","false",flashvars, params, attributes);</script>';

            $text = ereg_replace('<video.+?video>', $videocode, $text);
        }
        echo $text;
    }

}

?>