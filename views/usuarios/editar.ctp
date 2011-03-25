<?php echo $this->Javascript->codeBlock('var valorBanco = true; ', array("inline" => false)); ?>
<div id="sidebar">
    <!--PERFIL EMPRESA MENU-->
    <ul class="perfil-empresa-menu">
        <li id="dados-empresa" class="active dados-empresa" ><span class="link-button"><a href="#">Dados da Empresa</a></span></li>
        <li id="dados-adicionais"><span class="link-button"><a href="#">Dados Adicionais</a></span></li>
        <li id="dados-acesso"><span class="link-button"><a href="#">Dados de Acesso</a></span></li>
        <li id="dados-preferencias"><span class="link-button"><a href="#">Preferências</a></span></li>
    </ul><!--/PERFIL EMPRESA MENU-->
</div><!--/SIDEBAR-->

<!--CONTEUDO-->
<div id="content-min">
    <h4 class="no-img">Perfil de '<?php echo $LoginUsuario['nome'] ?>'</h4>  
	<?php echo $this->element('perfil/editar/dados-empresa') ;?>
	<?php echo $this->element('perfil/editar/dados-adicionais'); ?>        
	<?php echo $this->element('perfil/editar/dados-acesso'); ?>		
	<?php echo $this->element('perfil/editar/dados-preferencias'); ?>
</div><!--/CONTEUDO-->

<!--SIDEBAR-->
<div id="sidebar">
	<?php echo $this->element('enquete'); ?>
	<?php echo $this->element('rss'); ?>
	<?php echo $this->element('banner'); ?>
</div>
