<?php
if (!isset($perfilajax['Usuario']['logo']) || $perfilajax['Usuario']['logo'] == '') {
    $perfilajax['Usuario']['logo'] = 'default.gif';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
    </head>

    <body>
        <!--PERFIL-->
        <div class="fecharModal jqmClose"><a href="#">close</a> or Esc Key</div>
        <div id="perfil">
            <div class="post-img">
                <img src="/upload/usuarios/logos/<?php echo $perfilajax['Usuario']['logo']; ?>" height="88" width="129" />
            </div>
            <div class="post-content">
                <p><strong>Nome da empresa</strong><br /><?php echo $perfilajax['Usuario']['nome']; ?></p>
                <p><strong>Sobre a empresa:</strong><br />
                    <?php echo $perfilajax['Usuario']['sobre']; ?></p>

                <?php if ($this->Privacidade->check('ramo', $perfilajax['Usuario']['id'])) {
                ?>
                        <p><strong>Segmento</strong><br />
                    <?php echo $perfilajax['RamoAtividade']['desc']; ?></p>
                <?php } ?>
                <?php if ($this->Privacidade->check('contato', $perfilajax['Usuario']['id'])) {
                ?>
                        <p><strong>Dados de Contato:</strong><br />
                    <?php echo $perfilajax['Usuario']['contato']; ?><br />
                    					Telefone (<?php echo $perfilajax['Usuario']['ddd']; ?>) <?php echo $perfilajax['Usuario']['telefone']; ?><br />
                    <?php if ($this->Privacidade->check('site', $perfilajax['Usuario']['id'])) {
                    ?>
                            <a href="<?php echo $perfilajax['Usuario']['site']; ?>"><?php echo $perfilajax['Usuario']['site']; ?></a></p>
                <?php } ?>
                <?php } ?>
                </div>
                <div class="clear mt20">
                    <strong>Mensagem</strong>
                    <form id="form-perfil" action="/mensagens/enviar" method="post">
                        <fieldset>
                            <label>
                                <textarea name="data[Mensagem][mensagem]"></textarea>
                                <input type="hidden" name="data[Outros][_url]" value="/mensagens/enviadas/" />
                                <input type="hidden" name="data[Mensagem][para]" value="<?php echo $perfilajax['Usuario']['id']; ?>" />
                        </label>
                        <span class="link-button"><input type="submit" name="enviar" value="Enviar" /></span>
                    </fieldset>
                </form>
            </div>
        </div><!--/PERFIL-->
    </body>
</html>
