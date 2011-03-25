<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title><?php echo Configure::read('Company.name');?> - admin</title>
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
            <div class="wrapper"> <!-- wrapper begins -->
                <div id="header">
                    <div class="hdrl"></div>
                    <div class="hdrr"></div>

                    <h1><a href="#"><?php echo Configure::read('Company.name');?></a></h1>
                    <ul id="nav">
                        <li><a href="#">Conteúdos Dinamicos</a>
                            <ul>
                                <li><?php echo $this->Html->link('Notícias', '/admin/noticias/'); ?></li>
                                <li><?php echo $this->Html->link('Blog', '/admin/blog/'); ?></li>
                                <li><?php echo $this->Html->link('Dicas', '/admin/dicas/'); ?></li>
                                <li><?php echo $this->Html->link('Ramos de Atividade', '/admin/usuarios/ramo/'); ?></li>
                                <li style="height:1px;border:1px 0 0 0 dashed #efefef"></li>
                                <li><?php echo $this->Html->link('Ramos de Atividade (lista)', '/admin/usuarios/ramo_list/', array('style'=>'font-size:80%;color:#afa;')); ?></li>
                                <li><?php echo $this->Html->link('Tipos de Atividade (lista)', '/admin/usuarios/ramo_list/', array('style'=>'font-size:80%;color:#afa;')); ?></li>
                            </ul>
                        </li>
                        <li><?php echo $this->Html->link('Enquetes', '/admin/enquetes/'); ?></li>
                        <li><?php echo $this->Html->link('Tvantagens', '/admin/tvantagens/'); ?></li>
                        <li><?php echo $this->Html->link('Administradores', '/admin/administradores/'); ?></li>
                         <li><a href="#">Moderação</a>
                            <ul>
                                <li><?php echo $this->Html->link('Comentários', '/admin/comentarios/'); ?></li>
                                <li><?php echo $this->Html->link('Ponto de Negocio', '/admin/oportunidades/'); ?></li>
                                <li><?php echo $this->Html->link('Usuarios', '/admin/usuarios/'); ?></li>
                                <li><?php echo $this->Html->link('Fale Conosco', '/admin/contatos/'); ?></li>
                            </ul>
                        </li>
                        <li><a href="#">Exportar</a>
                            <ul>
                                <li><?php echo $this->Html->link('Usuarios', '/admin/usuarios/export/export.csv'); ?></li>
                                <li><?php echo $this->Html->link('Fale Conosco', '/admin/contatos/export/export.csv'); ?></li>
                                <li><?php echo $this->Html->link('Lista de Espera', '/admin/usuarios/exportprecadastro/ListaEspera.csv'); ?></li>
                            </ul>
                        </li>
                    </ul>

                    <p class="user">Olá, <?php echo $Administrador['nome']; ?> | <?php echo $this->Html->link('Logout', '/admin/administradores/logout/'); ?></p>

                </div><!-- #header ends -->
                <div class="block">
                    <?php echo $session->flash(); ?>
                    <?php echo $content_for_layout; ?>
                </div><!-- .block ends -->

                <div class="bendl"></div>
                <div class="bendr"></div>

                <div id="footer">

                    <p class="left">&nbsp;</p>
                    <p class="right"><?php echo Configure::read('Company.name');?></p>
                </div>

            </div><!-- wrapper ends -->

        </div><!-- #hld ends -->

    </body>
</html>