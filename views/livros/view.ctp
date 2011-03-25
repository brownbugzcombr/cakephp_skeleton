<div id="content">
    <h4 class="main-title title-noticia graphic">Blog</h4>
    <!--FAVORITOS-->
    <div id="favoritos">
        <!--POST-->
        <div class="post">
            <a href="javascript:history.back();" title="&laquo; voltar" class="right">&laquo; voltar</a>
            <!--p class="data-post"><?php echo date('d/m/Y', strtotime($dado['Post']['created'])); ?></p -->
            <h2><?php echo $dado['Post']['titulo']; ?></h2>
            <!--AUTOR-NOME-DIA-->
            <?php echo $dado['Post']['texto']; ?>
            <div class="post-info">
                <a href="#" class="comment" title=""><?php echo count($comentarios); ?> comentários</a>
                <ul class="curtir">
                    <?php if(isset($LoginUsuario)){ ?>
                    <li class="gostei"><a href="#"title="Gostei">Gostei</a></li>
                    <li class="nao-gostei"><a href="#" class="graphic" title="Não Gostei">Não Gostei</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div><!--/POST-->
        <div id="comment-post">
            <h4 class="main-title title-comentario graphic">Comentários</h4>
            <ol class="commentlist">
                <?php foreach ($comentarios as $coment) {
                ?>
                    <li id="comment">
                        <div class="comment-content">
                            <a href="#" class="right" title="Reportar abuso" style="display: none;">Reportar abuso</a>
                            <div class="comment-author vcard">
                                <img width="40" height="40" class="avatar" src="/upload/usuarios/logos/thumb/perfilPequena/<?php echo $coment['Usuario']['logo'];?>" alt="">
                                <cite class="fn"><a class="jqLinkBox url" href="/usuarios/perfilajax/<?php echo $coment['Usuario']['id']; ?>/" rel="external nofollow" title="Fale com a Empresa"><?php echo $coment['Usuario']['nome']; ?></a></cite>
                                <span class="says">disse em</span>
                                <a href="#" class="date"><?php echo date('d/m/Y á\s H:i', strtotime($coment['Comentario']['created'])); ?></a>
                            </div><!-- .comment-author .vcard -->
                            <p><?php echo $coment['Comentario']['texto']; ?></p>
                        </div>
                        <span class="border-bottom graphic">borda</span>
                    </li>
                <?php } ?>
            </ol>
            <?php if(isset($LoginUsuario)){ ?>
            <h5>Deixe o seu comentário</h5>
            <p><strong>Nome</strong>: <?php echo $LoginUsuario['nome']; ?></p>
            <?php echo $this->Form->create('Comentario', array('action' => 'comentar')); ?>
                <label for="comment">
                <?php echo $form->textarea('texto'); ?>
                <?php echo $form->hidden('post_id', array('value' => $dado['Post']['id'])); ?>
            </label>
            <span class="link-button"><input type="submit" name="comment-enviar" value="Enviar" /></span>
            <?php echo $form->end(); ?>
            <?php } ?>
            </div>
            <!--VEJA-TB-->
        <?php echo $this->element('veja-tambem', array('tipo' => 1)); ?>
                <!--VEJA-TB-->
            </div><!--/FAVORITOS-->
        </div><!--/CONTEUDO-->
        <!--SIDEBAR-->
        <div id="sidebar">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div><!--/SIDEBAR-->
<!-- modal -->
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