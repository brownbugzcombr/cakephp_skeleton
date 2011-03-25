<table border="0" cellpadding="0" cellspacing="0" width="590" align="center">
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/header.jpg" width="590" height="117" style="display:block" /></td>
    </tr>
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/title.jpg" width="590" height="68" style="display:block" /></td>
    </tr>
    <tr>
        <td width="29"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/content-left.jpg" width="29" height="250" style="display:block" /></td>
        <td width="551" valign="top">
            <?php foreach($params as $campo => $valor){ ?>
            <b><?php echo $campo; ?></b> <?php echo $valor; ?> <br />
            <?php } ?>
        </td>
        <td width="29"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/content-right.jpg" width="29" height="250" style="display:block" /></td>
    </tr>
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/city.jpg" width="590" height="137" style="display:block" /></td>

    </tr>
    <tr>
        <td bgcolor="#eaebf2" colspan="3">

                <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/contatos/" title="Fale Conosco" style="color:#039;">Fale Conosco</a><span style="padding:0 11px">|</span>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/termos/" title="Termos de uso" style="color:#039;">Termos de uso</a><span style="padding:0 11px">|</span>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sobreoportal/" title="Sobre o Portal" style="color:#039;">Sobre o Portal</a><span style="padding:0 11px">|</span>
                <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" title="Telefônica Negócios" style="color:#039;">Telefônica Negócios</a>

        </td>
    </tr>
</table>