<?php echo $this->Element('oportunidades'); ?>
<div id="content-min">
<<<<<<< HEAD
    <h4 class="main-title title-msg2 graphic ajuste oportunidades" style="margin-bottom:5px;">Minhas Mensagens</h4>
=======
    <h4 class="main-title title-msg2 graphic">Minhas Mensagens</h4>
>>>>>>> 619159684b78fd86b7409c632a7a927fa3f531f7
    <!--MINHAS-MENSAGENS-->
    <div id="mensagens">
        <h2 class="recebidas"><a href="/mensagens/" class="inativo" title="Mensagens Enviadas">Mensagens Recebidas </a></h2>
        <h2 class="enviadas"><a href="/mensagens/enviadas/" class="ativo" title="Mensagens Enviadas">Mensagens Enviadas </a></h2>
        <!--MSG-->
        <?php foreach ($dados as $d) {
        ?>
        <?php
            if (!isset($d['UsuarioEnviada']['logo']) || $d['UsuarioEnviada']['logo'] == '') {
                $d['UsuarioEnviada']['logo'] = 'default.gif';
            }
        ?>
            <div class="msg">
                <div class="empresa-logo">
                    <a class="jqLinkBox centralizar" href="/usuarios/perfilajax/<?php echo $d['UsuarioEnviada']['id']; ?>/" title="<?php echo $d['UsuarioEnviada']['nome']; ?>">
                        <img src="/upload/usuarios/logos/thumb/perfil/<?php echo $d['UsuarioEnviada']['logo']; ?>" height="100" width="100" alt="<?php echo $d['UsuarioEnviada']['nome']; ?>" />
                    </a>
                </div>
                <div class="msg-content">
                    <ul class="msg-info">
                        <li class="nome-empresa"><?php echo $d['UsuarioEnviada']['nome']; ?></li>
                        <li class="data-msg"><span>&nbsp;|&nbsp; Enviado em </span><?php echo date('d/m/Y', strtotime($d['Mensagem']['created'])); ?> às <?php echo date('H:i', strtotime($d['Mensagem']['created'])); ?>h</li>
                    </ul>
                    <p><?php echo $d['Mensagem']['mensagem']; ?></p>
                    <br />
                    <ul class="msg-func">
                        <li class="excluir"><a href="/mensagens/delde/<?php echo $d['Mensagem']['id']; ?>" title="Excluir">Excluir mensagem</a></li>
                    </ul>
                </div>
            </div><!--/MSG-->
        <?php } ?>
        <!--MSG-->


    </div><!--/MSG-->
    <?php echo $this->element('paginator_site'); ?>
    </div><!--MINHAS-MENSAGENS-->
    <!--SIDEBAR-->
    <div id="sidebar" class="oportSide">
    <?php echo $this->Element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div>
<div class="jqmWindow" id="ex2">Carregando...</div>
<script type="text/javascript">
    $().ready(function() {
        $('.jqmWindow').jqm(
        {
            ajax: '@href',
            trigger: 'a.jqLinkBox',
            modal: true
        }
    );
    });
</script>