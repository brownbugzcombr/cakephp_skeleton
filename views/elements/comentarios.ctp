<div id="comment-post">
    <h4 class="main-title title-comentario graphic">Comentários</h4>
    <a name="#commentario" />
    <ol class="commentlist">
        <?php foreach ($comentarios as $coment) {
        ?>
        <?php
            if (!isset($coment['Usuario']['logo']) || $coment['Usuario']['logo'] == '') {
                $coment['Usuario']['logo'] = 'default.gif';
            }
        ?>
            <li id="comment">
                <div class="comment-content">
                    <a href="#" class="right" title="Reportar abuso" style="display: none;">Reportar abuso</a>
                    <div class="comment-author vcard">
                        <img width="40" height="40" class="avatar" src="/upload/usuarios/logos/thumb/perfilPequena/<?php echo $coment['Usuario']['logo']; ?>" alt="">
                        <cite class="fn"><a class="jqLinkBox url" href="/usuarios/perfilajax/<?php echo $coment['Usuario']['id']; ?>/" rel="external nofollow" title="Fale com a Empresa"><?php echo $coment['Usuario']['nome']; ?></a></cite>
                        <span class="says">disse em</span>
<?php echo date('d/m/Y à\s H:i', strtotime($coment['Comentario']['created'])); ?>
                    </div><!-- .comment-author .vcard -->
                    <p><?php echo $coment['Comentario']['texto']; ?></p>
            </div>
            <span class="border-bottom graphic">borda</span>
        </li>
<?php } ?>
    </ol>

<?php if (isset($LoginUsuario)) { ?>
        <h5>Deixe o seu comentário</h5>
        <p><strong>Nome</strong>: <?php echo $LoginUsuario['nome']; ?></p>
    <?php echo $this->Form->create('Comentario', array('action' => 'comentar')); ?>
            <label for="comment">
<?php echo $form->textarea('texto'); ?>
    <?php echo $form->hidden('Outros.controller', array('value' => $this->params['controller'])); ?>
<?php echo $form->hidden('post_id', array('value' => $dado['Post']['id'])); ?>
            </label>
            <span class="link-button"><input type="submit" name="comment-enviar" value="Enviar" onclick="if($('#ComentarioTexto').val() == ''){alert('Comentário não pode ser vazio'); return false;}" /></span>
        <?php echo $form->end(); ?>
<?php } ?>
</div>