<!--SIDEBAR-->
<div id="sidebar" class="mb44">
    <div class="categorias">
        <?php echo $this->element('filtros'); ?>

        <?php echo $this->element('categorias'); ?>
    </div>
</div>


<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-dicas graphic">Dicas</h4>
    <!--FAVORITOS-->
    <div id="favoritos" class="favoritos3Col">

        <?php
        //debug($dados);
        if (isset($dados) && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $d) {
                $slug = ($d['Post']['slug']==''?$d['Post']['id']:$d['Post']['slug']);
        ?>
                <div class="post">
            <?php if (isset($d['Post']['img_destaque']) && $d['Post']['img_destaque'] != '') {
            ?>
                    <a class="post-img" href="/dicas/view/<?php echo $slug; ?>" title="">
                        <img src="/upload/posts/destaque/<?php echo $d['Post']['img_destaque']; ?>" height="85" width="147" />

                    </a>
            <?php } ?>
                <h2><?php echo $this->Html->link($d['Post']['titulo'], array('action' => 'view', $slug)); ?></h2>
                <p><?php echo $d['Post']['resumo'] ?></p>
                <div class="post-info">
                    <a href="/dicas/view/<?php echo $slug; ?>" class="comment-blog" title=""><?php echo count($d['Comentario']); ?> comentários</a>
                </div>
            </div>
        <?php
            }
        } else {
        ?>

            <div class="post">
                <h2> Nenhum item encontrado</h2>
            </div>

        <?php } ?>
        <!--PAGINACAO-->
        <?php echo $this->element('paginator_site'); ?>
        <!--/PAGINACAO-->
    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar">
    <?php echo $this->element('enquete'); ?>

    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div><!--/SIDEBAR-->