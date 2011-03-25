<!--SIDEBAR-->
<div id="sidebar">
    <div class="categorias">

        <?php echo $this->element('filtros'); ?>
        <?php echo $this->element('categorias'); ?>

    </div>
</div><!--/SIDEBAR-->
<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-blog graphic">Blog</h4>
    <!--FAVORITOS-->
    <div id="favoritos" class="favoritos3Col">

        <?php
        //debug($dados);
        foreach ($dados as $d) {

            if ($d['Post']['slug']==""){
                $slug=$d['Post']['id'];
            }else{
                $slug=$d['Post']['slug'];
            }
        ?>
            <div class="post">
                <p class="data-post"><?php echo date('d/m/Y', strtotime($d['Post']['created'])); ?></p>
            <?php if (isset($d['Post']['img_destaque']) && $d['Post']['img_destaque'] != '') {
            ?>
                <a class="post-img" href="/blog/view/<?php echo $slug; ?>/" title="">
                    <img src="/upload/posts/destaque/<?php echo $d['Post']['img_destaque']; ?>" height="135" width="165" />
                </a>
            <?php } ?>
            <h2><?php echo $this->Html->link($d['Post']['titulo'], array('action' => 'view', $slug)); ?></h2>
            <p><?php echo $d['Post']['resumo'] ?><br clear="all" /><br clear="all" /><a href="/blog/view/<?php echo $slug; ?>">&raquo; Leia mais</a></p>
            <div class="post-info">
                <a href="/blog/view/<?php echo $slug; ?>" class="comment-blog" title=""><?php echo count($d['Comentario']); ?> comentários</a>
            </div>
        </div>
        <?php } ?>
        <!--PAGINACAO-->
        <?php echo $this->element('paginator_site'); ?>
        <!--/PAGINACAO-->
    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar" class="mt0">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div><!--/SIDEBAR-->