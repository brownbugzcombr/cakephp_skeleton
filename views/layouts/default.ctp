<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" xml:lang="pt-br" lang="pt-br" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $title_for_layout; ?></title>
  <meta name="description" content="<?php echo @$meta_for_layout ?>">
  <meta name="author" content="<?php echo @$keywords_for_layout ?>">
        <meta name="copyright" content="Copyright © 2011 - Bugz Consultoria Digital" />
        <meta name="distribution" content="Global" />

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
   <!-- 
   
   
   
   MINIFIED JAVSCRIPT 
   
   
   
   
   
   -->
        
        <?php
    /*   HERE STARTS THE NORMAL STUFF AGAIN   */
/*        echo $this->Html->script(
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
*/
//        $this->Minify->js('jquery-1.4.4.min');
//        $this->Minify->js('jqModal');
//        $this->Minify->js('jquery-validate/jquery.validate.min');
//        $this->Minify->js('custom');
//        $this->Minify->js('swfobject/swfobject');
//        $this->Minify->js('caixaDestaque');
//        $this->Minify->js('audio-player');
//        $this->Minify->js('jquery.progressbar.min');
//        $this->Minify->js('validaBusca');
//        
                        $this->Minify->js(array(
                            'jquery-1.4.4.min',
                            'jqModal',
                            'jquery-validate/jquery.validate.min',
                            'custom',
                            'swfobject/swfobject',
                            'caixaDestaque',
                            'audio-player',
                            'jquery.progressbar.min',
                            'validaBusca'
                        ));
  
        echo $scripts_for_layout;
        ?>
   <!-- 
   
   
   
   MINIFIED JAVSCRIPT 
   
   
   
   
   
   -->
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
        /*
         * @todo precisa alterar essa exibição de mensagem para uma mais amigável ao usuário
         */
        echo $session->flash();
        ?>
        <div id="wrap">
            <!--CABECALHO-->
            <?php echo $this->element('lay_default/header', array('cache'=>false)); ?>

        </div><!--/GERAL-->
        <!--RODAPE-->

        <div id="content" class="container_12">
        <?php echo $content_for_layout; ?>
        </div>

        <?php echo $this->element('lay_default/footer'); ?>





        <div class="jqmConfirm" id="alert">
            <div id="ex3b" class="jqmConfirmWindow">
                <div class="fecharModal jqmClose"><a href="#"><?echo __('Fechar Janela')?></a> <?echo __('ou pressione Esc')?></div>
                <div class="conteudoModal">
                    <p class="jqmConfirmMsg" style="text-align: center; font: bold 14px arial;"><?echo __('Login ou senha inválidos.');?></p>
                    <br class="all" />
                    <img src="/img/bt-fechar.gif" alt="Fechar modal" class="pointer" onclick="$('#alert').jqmAddClose('#alert');" />
                </div>
            </div>
        </div>

        <?php if (isset($showModal)) {
        ?>
                <script type="text/javascript">
                    $('#<?php echo $showModal; ?>').jqm({modal: true});
                    $('#<?php echo $showModal; ?>').jqmShow()
                </script>
        <?php } ?>

            <div id="esquecisenha" class="jqmConfirm">
                <div class="jqmConfirmWindow msg1faleconosco">
                    <div class="fecharModal jqmClose"><?echo __('Fechar Janela')?></a> <?echo __('ou pressione Esc')?></div>
                    <div id="titleModal">
                        <h3 class="pbt13">Digite seu e-mail, para que possamos lhe enviar os seus dados de acesso a sua página exclusiva do Sua Empresa, Nosso Negócio</h3>
                    </div>
                    <form id="esqueceu-senha" action="/usuarios/esqueci/" method="post">
                        <fieldset>
                            <label class="acertoPrelabel">
                                <strong>E-mail</strong>
                                <input class="senha" type="text" value="" name="data[Usuario][email]" style="width: 290px;" />
                            </label>
                            <span class="link-button"><input type="submit" name="cadastro-email" value="Enviar" /></span>
                        </fieldset>
                    </form>
                    <p class="center mb20">*Caso tenha problemas com o seu e-mail, entre em contato através do <a href="/contatos/" title="Fale Conosco">Fale Conosco</a></p>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var validator = $("#esqueceu-senha").validate({
                            rules: {
                                'data[Usuario][email]': {
                                    required: true
                                }
                            },
                            messages: {
                                'data[Usuario][email]': ""
                            },
                            errorClass: "invalid"
                        });

                    });
                </script>
            </div>

        <?
            /* <script type="text/javascript">
              var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
              document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
              </script>
              <script type="text/javascript">
              try {
              var pageTracker = _gat._getTracker("UA-20309652-1");
              pageTracker._trackPageview();
              } catch(err) {}</script>

             */
        ?>

    </body>
</html>