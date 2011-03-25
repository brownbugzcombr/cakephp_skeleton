<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Telefonica</title>
        <?php
        echo $this->Html->css(array(
            'admin/style_admin',
            'admin/jquery.wysiwyg',
            'admin/facebox',
            'admin/visualize',
            'admin/date_input',
            'admin/autocomplete'
        ));
        ?>

        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=7" /><![endif]-->
        <!--[if lt IE 8]><style type="text/css" media="all">@import url("/css/ie.css");</style><![endif]-->
        <!--[if IE]><script type="text/javascript" src="/js/excanvas.js"></script><![endif]-->
        <?php
        echo $this->Html->script(array(
            'admin/jquery',
            'admin/jquery.img.preload',
            'admin/jquery.filestyle.mini',
            'ckeditor/ckeditor',
            'admin/jquery.wysiwyg',
            'admin/jquery.date_input.pack',
            'admin/facebox',
            'admin/jquery.visualize',
            'admin/jquery.select_skin',
            'admin/ajaxupload',
            'admin/jquery.pngfix',
            'admin/custom',
            'admin/jquery.autocomplete.min',
            'admin/jquery.smallColorPicker',
            'admin/tablend'
        ));
        ?>
    </head>
    <body>
        <div id="hld">

            <div class="wrapper">		<!-- wrapper begins -->
                
                <?php echo $content_for_layout; ?>
            </div>						<!-- wrapper ends -->

        </div><!-- #hld ends -->

    </body>
</html>