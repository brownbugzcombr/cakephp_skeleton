<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
    </head>
    <body>
        <!--PERFIL-->
        <div id="perfil">
            <form id="form-perfil" action="/mensagens/enviar" method="post">
                <fieldset>
                    <label>
                        <textarea name="data[Mensagem][mensagem]"></textarea>
                        <input type="hidden" name="data[Outros][_url]" value="/oportunidades/" />
                        <input type="hidden" name="data[Mensagem][para]" value="<?php echo $para; ?>" />
                    </label>
                    <span class="link-button"><input type="submit" name="enviar" value="Enviar" /></span>
                </fieldset>
            </form>
        </div><!--/PERFIL-->
    </body>
</html>
