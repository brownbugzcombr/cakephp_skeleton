<!--SIDEBAR-->
<div id="sidebar" class="sideNot">
    <div class="categorias">

        <?php echo $this->element('filtros'); ?>
        <?php echo $this->element('categorias'); ?>

    </div>
</div><!--/SIDEBAR-->
<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-ajuste-news graphic">Notícias</h4>
    <!--FAVORITOS-->
    <div id="favoritos" class="favoritos3Col">

        <?php
        //debug($dados);
        foreach ($dados as $d) {
            $slug = ($d['Post']['slug']==''?$d['Post']['id']:$d['Post']['slug']);
            ?>
            <div class="post">
            <?php if (isset($d['Post']['img_destaque']) && $d['Post']['img_destaque'] != '') {
            ?>
                <!-- a class="post-img" href="/noticias/view/<?php echo $d['Post']['id']; ?>/" title="">
                    <img src="/upload/posts/destaque/<?php echo $d['Post']['img_destaque']; ?>" height="135" width="165" />
                </a -->
            <?php } ?>
            <h2><?php echo $this->Html->link($d['Post']['titulo'], array('action' => 'view', $slug)); ?></h2>
            <p><?php echo $d['Post']['resumo'] ?><br clear="all" /><br clear="all" /><a href="/noticias/view/<?php echo $slug; ?>">&raquo; Leia mais</a></p>
            <div class="post-info">
                <a href="/noticias/view/<?php echo $slug; ?>" class="comment-blog" title=""><?php echo count($d['Comentario']); ?> comentários</a>
            </div>
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