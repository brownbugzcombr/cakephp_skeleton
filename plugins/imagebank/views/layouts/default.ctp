<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <!--meta-tag-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="pt-br" />
        <meta name="description" content="<?php echo @$meta_for_layout ?>" />
        <meta name="keywords" content="<?php echo @$keywords_for_layout ?>" />
        <meta name="author" content="" />
        <meta name="copyright" content="Copyright © 2011 - Bugz Consultoria Digital" />
        <meta name="distribution" content="Global" />
        <link rel="shortcut icon" href="/img/favicon.ico" />
        <?php
        echo $this->Html->script(
                array_merge(
                        array(
                            'jquery-1.4.4.min',
                            'jqModal',
                            'jquery-validate/jquery.validate.min',
                            'custom',
                            'swfobject/swfobject',
                            'caixaDestaque',
                            'audio-player',
                            'jquery.progressbar.min',
                            'validaBusca'
                        ),
                        $scripts_layout
                )
        );

        echo $scripts_for_layout;
        ?>
        <script type="text/javascript">
            AudioPlayer.setup("/swf/playerpod.swf", {
                width: 290
            });
        </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"> </script>
        <?php
        echo $this->Html->css(array(
            'layout',
            '960',
            // 'style',
            'jqModal'
        ));
        ?>
        <script type="text/javascript">

            var flashvars = {};
            var params = {wmode:"transparent"};
            var attributes = {};
            swfobject.embedSWF("/swf/pertodevoce_banner_180x420.swf", "bannerFlash", "180", "420", "9.0.0", "expressInstall.swf", flashvars, params, attributes);

            $('#alert').jqm({modal: true});
            $('#alert').jqmShow();

            function esqueci(){
                $('#esquecisenha').jqm({modal: true});
                $('#esquecisenha').jqmShow();
            }
        </script>
    </head>
    <body class="<?php echo @$bodyclass; ?>">
        <?php
        echo $session->flash();
        ?>
<!--  

    CONTEUDO 

-->
        <div id="content" class="container_12">
        <?php echo $content_for_layout; ?>
        </div>

<!--  

    CONTEUDO 

-->

    </body>
</html>