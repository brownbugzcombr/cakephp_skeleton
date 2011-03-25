<?php
/*
  if (isset($LoginUsuario)) { ?>
  <div id="login-on">
  <!--IMAGEM-EMPRESA-->
  <a href="#" class="login-on-empresa">
  <?php
  if(!isset($LoginUsuario['logo']) || $LoginUsuario['logo'] == ''){
  $LoginUsuario['logo'] = 'default.gif';
  }
  ?>
  <img src="/upload/usuarios/logos/thumb/perfilPequena/<?php echo $LoginUsuario['logo'];?>" alt="<?php echo $LoginUsuario['nome']; ?>" height="63" width="63" />
  </a>
  <!--INFORMACOES-EMPRESA-->
  <div class="dialogo">
  <p class="nome"><strong>Olá</strong> <?php echo $LoginUsuario['nome']; ?></p>
  <ul class="dialogo-content">
  <li class="cadastro"><strong>Cadastro</strong>:</li>
  <li class="porcentagem">
  <?php if(isset($LoginUsuario['created']) && isset($LoginUsuario['updated']) && $LoginUsuario['created'] == $LoginUsuario['updated']){ ?>
  <img src="/img/porcentagem.gif" height="20" width="109" alt="" />
  <?php }else{ ?>
  <img src="/img/100-porcento.gif" height="20" width="109" alt="" />
  <?php } ?>

  </li>
  <li><?php echo $this->Html->link('Editar Perfil', array('controller' => 'usuarios', 'action' => 'editar')); ?> | <?php echo $this->Html->link('Sair', array('controller' => 'usuarios', 'action' => 'logout')); ?></li>
  </ul>
  </div><!--/INFORMACOES-EMPRESA-->
  <!--BUSCA-->
  <form id="busca" method="post" action="/posts/busca/">
  <fieldset>
  <label for="busca">
  <input type="text" name="data[Post][busca]" />
  </label>
  <span class="link-button"><input type="submit" name="login-entrar" value="Buscar" /></span>
  </fieldset>
  </form><!--BUSCA-->
  </div><!--/LOGIN-ON-->
  <?php echo $this->element('menu'); ?>
  <?php } else {
  ?>
  <div id="login-off">
  <!--CADASTRE-SE-->
  <div class="cadastre-se">
  <p>Aqui, você tem acesso a conteúdos e vantagens exclusivas. Um mundo de oportunidades para o seu negócio!</p>
  <span class="link-button"><a href="/usuarios/precadastro" title="Cadastre-se já!">Cadastre-se já!</a></span>
  </div><!--/CADASTRE-SE-->
  <!--LOGIN-->
  <?php echo $this->Form->create('Usuarios', array('action' => 'login', 'id' => 'cadastro', 'class' => 'login')); ?>
  <fieldset>
  <label for="email">E-mail
  <?php echo $this->Form->text('Usuario.email', array()); ?>
  </label>
  <label for="senha">Senha
  <?php echo $this->Form->password('Usuario.senha', array()); ?>
  <span><a href="javascript:void(null);" onclick="esqueci();">Esqueceu sua senha?</a></span>
  </label>
  <span class="link-button"><input type="submit" name="login-entrar" value="Entrar" /></span>
  </fieldset>
  <?php echo $form->end(); ?>
  </div><!--/LOGIN-OFF-->
  <?php }
 *
 *
 */
?>

