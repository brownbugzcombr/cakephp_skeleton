<!--SIDEBAR-->
<div id="sidebar">
    <div class="categorias">

        <?php echo $this->element('filtros'); ?>
        <?php echo $this->element('categorias'); ?>

    </div>
</div><!--/SIDEBAR-->
<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-favoritos graphic">Meus Favoritos</h4>
    <!--FAVORITOS-->
    <div id="favoritos" class="favoritos3Col">

        <?php
        //debug($dados);
        if (isset($dados) && is_array($dados) && count($dados) > 0) {
            foreach ($dados as $d) {
                $tipo = null;
                if ($d['Post']['tipo'] == 1) {
                    $tipo = 'noticias';
                } elseif ($d['Post']['tipo'] == 2) {
                    $tipo = 'blog';
                } elseif ($d['Post']['tipo'] == 3) {
                    $tipo = 'livros';
                } elseif ($d['Post']['tipo'] == 4) {
                    $tipo = 'dicas';
                }
        ?>
                <div class="post" id="post_<?php echo $d['Post']['id']; ?>">
            <?php if (isset($d['Post']['img_destaque']) && $d['Post']['img_destaque'] != '') {
            ?>
                    <a class="post-img" href="#" title="">
                        <img src="/upload/posts/<?php echo $d['Post']['img_destaque']; ?>" height="135" width="165" />
                    </a>
            <?php } ?>
                <h2><?php echo $this->Html->link($d['Post']['titulo'], array('action' => 'view', 'controller' => $tipo, $d['Post']['id'])); ?></h2>
                <p><?php echo $d['Post']['resumo'] ?></p>
                <div class="post-info">
                    <a href="#" class="comment-blog" title=""><?php echo count($d['Comentario']); ?> comentários</a>
                    <span class="link-button"><a href="javascript:void(null);" title="Remover" onclick="gostei(<?php echo $d['Post']['id']; ?>, 0, 1)">Remover<span class="remover">-</span></a></span>
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


    </div><!--/FAVORITOS-->
</div><!--/CONTEUDO-->
<!--SIDEBAR-->
<div id="sidebar" class="mt0">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div><!--/SIDEBAR-->