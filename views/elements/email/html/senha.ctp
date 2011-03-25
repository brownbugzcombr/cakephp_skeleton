<table border="0" cellpadding="0" cellspacing="0" width="590" align="center">
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/header.jpg" width="590" height="117" /></td>
    </tr>
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/title.jpg" width="590" height="68" /></td>
    </tr>
    <tr>
        <td width="19"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/content-left.jpg" width="19" height="189" /></td>
        <td width="551" valign="top" style="padding:0 10px">
            <p style="font:12px/16px 'Arial',Tahoma,Verdana;color:#333;">Olá,
                <span style="color:#0f89df;"><?php echo $params['nome']; ?></span>,
            </p>
            <p style="font:12px/14px 'Arial',Tahoma,Verdana;color:#333;">Você solicitou, através do portal <span style="color:#0f89df;">SUA EMPRESA, NOSSO NEGÓCIO,</span> a sua senha de acesso.<br /><a href="<?php echo $params['link']; ?>">Clique aqui</a> para alterar sua senha:</p>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" title="Acesse Já" style="float:left;margin-right:10px"><img alt=""  src="http://<?php echo $_SERVER['REMOTE_ADDR']; ?>/img/email/senha/acesse-ja.gif" height="29" width="103" border="0" /></a>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" title="" style="font:11px 'Arial',Tahoma,Verdana;color:#0f89df;line-height:26px">www.suaempresanossonegocio.com.br</a>
            <p style="font:11px 'Arial',Tahoma,Verdana;color:#333;"><span style="color:#ff0000;">Atenção!</span> Sua senha é pessoal e intransferível. Guarde-a com segurança.</p>
        </td>
        <td width="20"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/content-right.jpg" width="20" height="189" /></td>
    </tr>
    <tr>
        <td colspan="3"><img alt=""  src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/senha/city.jpg" width="590" height="115" /></td>
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