<table border="0" cellpadding="0" cellspacing="0" width="590" align="center">
    <tr>
        <td colspan="3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/cadastro/header.jpg" width="590" height="117" style="display:block" /></td>
    </tr>
    <tr>
        <td colspan="3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/cadastro/title.jpg" width="590" height="68" style="display:block" /></td>
    </tr>
    <tr>
        <td width="29"><img src="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/img/email/cadastro/content-left.jpg" width="29" height="350" style="display:block" /></td>
        <td width="551" height="295" valign="top">
            <p style="font:12px/16px 'Arial',Tahoma,Verdana;color:#333;">Olá,
                <span style="color:#0f89df;"><?php echo $params['nome']; ?></span>,
            </p>
            <h2 style="font:22px 'Arial',Tahoma,Verdana;color:#0f89df;margin:0">Seu cadastro foi realizado com sucesso!</h2>
            <p style="font:12px/14px 'Arial',Tahoma,Verdana;color:#333;">A partir de agora, você tem acesso exclusivo ao portal <strong>SUA EMPRESA, NOSSO NEGÓCIO</strong> e pode aproveitar tudo o que a <strong>Telefônica Negócios</strong> oferece para sua empresa: notícias, dicas, oportunidades de negócios, descontos e ofertas incríveis dos parceiros do t vantagens Negócios.</p>
            <p style="font:16px 'Arial',Tahoma,Verdana;color:#ff0000; font-weight: bold;">Atenção! Antes de acessar, é necessário confirmar seu cadastro.</p>
            <p>
            <a style="font:16px 'Arial',Tahoma,Verdana;color:#333; font-weight: bold;" href="http://<?php echo $params['link']; ?>">>>> CLIQUE AQUI PARA CONFIRMAR SEU CADASTRO OU COLE O LINK A SEGUIR NO SEU NAVEGADOR <<<</a></p>
            <p style="font:12px/14px 'Arial',Tahoma,Verdana;color:#333;"><?php echo $params['link']; ?></p>

			<p style="font:12px 'Arial',Tahoma,Verdana;color:#333;">Anote seus dados de acesso:</p>
            <p style="font:12px 'Arial',Tahoma,Verdana;color:#039;">
				Login: <span style="font-size:15px;color:#333;padding-left:20px"><?php echo $params['email']; ?></span><br />
                                senha: <span style="font-size:15px;color:#333;padding-left:20px"><?php echo $params['senha2']; ?></span><br />
            </p>
            <a href="http://www.suaempresanossonegocio.com.br/" title="Acesse Já" style="float:left;margin-right:10px"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/cadastro/acesse-ja.gif" height="29" width="103" border="0" style="display:block" /></a>
            <a href="http://www.suaempresanossonegocio.com.br/" title="" style="font:11px 'Arial',Tahoma,Verdana;color:#0f89df;line-height:26px">www.suaempresanossonegocio.com.br</a>
            <p style="font:11px 'Arial',Tahoma,Verdana;color:#333;"><span style="color:#ff0000;">Atenção!</span> Sua senha é pessoal e intransferível. Guarde-a com segurança.</p>
        </td>
        <td width="29"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/cadastro/content-right.jpg" width="29" height="350" style="display:block" /></td>
    </tr>
    <tr>
        <td colspan="3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/img/email/cadastro/city.jpg" width="590" height="98" style="display:block" /></td>
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