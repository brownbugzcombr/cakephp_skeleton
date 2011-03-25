<div id="content">
    <!--NOTICIAS-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#noticias").featuredbox({
                width: 600,
                height: 300,
                slidesAnimation: "slide-top",
                slidesSpeed: "slow",
                descriptionAnimation: "slide-bottom",
                descriptionSpeed: "slow"});
        });
    </script>
    <h4 class="main-title graphic">Notícias</h4>
    <div id="noticias">
        <ul>
            <?php foreach ($noticia as $b) {
            ?>
                <li>
                    <a href="/noticias/view/<?php echo $b['Post']['id']; ?>"><img src="/upload/posts/home/thumb/use/<?php echo $b['Post']['img_home']; ?>" alt="" height="190" width="480"></a>
                    <p><a href="/noticias/view/<?php echo $b['Post']['id']; ?>"><strong><?php echo $b['Post']['titulo']; ?></strong></a><br/><span class="link-button"><a title="Veja mais" href="#">Veja mais</a></span></p>
                    <p><a href="/noticias/view/<?php echo $b['Post']['id']; ?>"><?php echo $b['Post']['chamada']; ?></a></p>

                </li>
            <?php } ?>
        </ul>
    </div><!--/NOTICIAS-->
    <!--NOTICIAS-->



    <div id="noticias" style="display: none;">
        <ul style="display: none;">
            <?php foreach ($noticia as $b) {
            ?>
                <li>
                    <img src="/upload/posts/home/thumb/use/<?php echo $b['Post']['img_home']; ?>" alt="" height="190" width="480">
                    <p class="description"><a href="#"><?php echo $b['Post']['titulo']; ?></a></p>
                    <p><?php echo substr($b['Post']['resumo'], 0, 64); ?></p>
                </li>
            <?php } ?>
        </ul>
    </div><!--/NOTICIAS-->
    <!--VEJA-TAMBEM-->
    <h4 class="main-title title-veja-tambem graphic">Veja Também</h4><!--VEJA-TAMBEM-->
    <!--ULTIMAS-BLOG 2 -->
    <div class="blog veja-tambem">
        <h3>Blog</h3>
        <!--POST-->
        <?php foreach ($blog as $b) {
        ?>
                <div class="post">
                    <p class="data"><?php echo date('d/m/Y', strtotime($b['Post']['created'])); ?></p>
                    <h2><a href="/blog/view/<?php echo $b['Post']['id']; ?>"><?php echo $b['Post']['titulo']; ?></a></h2>
                    <p><?php echo $b['Post']['resumo']; ?></p>
                    <a href="/blog/view/<?php echo $b['Post']['id']; ?>" title="leia mais">&raquo; Leia mais</a>
                </div><!--/POST-->
        <?php } ?>

            <a href="/blog/" title="+ notícias do Blog">+ notícias do Blog</a>
        </div><!--/ULTIMAS-BLOG-->
        <!--PONTO-NEGOCIOS 3 -->
        <div class="ponto-negocios veja-tambem">
            <h3 class="ponto-negocios">Ponto de Negócios</h3>

        <?php foreach ($ponto as $b) {
        ?>
                <div class="post">
                    <h5 class="titOportunidade"><a href="/oportunidades/" class="azulescuro"><?php echo $this->Texto->truncate($b['Oportunidade']['titulo'], 25, '...'); ?></a></h5>
                    <div class="post-img">
                        <a href="/oportunidades/" title="">
                            <img src="/upload/usuarios/logos/thumb/perfilPequena/<?php echo $b['Usuario']['logo']; ?>" height="45" width="45" />
                        </a>
                    </div>
                    <div class="post-content">
                        <p><a href="/oportunidades/" class="azulescuro"><?php echo $this->Texto->truncate($b['Oportunidade']['texto'], 50, '...'); ?></a></p>
                    </div>
                </div>
        <?php } ?>

        <a href="/oportunidades/" title="+ oportunidades de Negócios">+ oportunidades de Negócios</a>
    </div><!--/PONTO-NEGOCIOS-->

    <!--T-VANTAGENS 3 -->
    <div class="t-vantagens veja-tambem last-margin">
        <h3>t vantagens Negócios</h3>

    <?php foreach ($tvantagem as $b) {
    ?>
                <div class="post">
                    <div class="post-img">
                        <a href="/tvantagens/" title="">
                            <img src="/upload/tvantagem/thumb/home/<?php echo $b['Tvantagem']['logotipo']; ?>" width="93" height="44" />
                        </a>
                    </div>
                    <div class="post-content">
                        <p><?php echo $b['Tvantagem']['resumo']; ?></p>
                    </div>
                </div><!--/POST-->
    <?php } ?>


            <a href="/tvantagens/" title="+ t vantagens Negócios">+ t vantagens Negócios</a>


        </div><!--/T-VANTAGENS-->


        <!--DICAS-P/-VOCE-->
        <h4 class="main-title title-dicas-vc graphic">Dicas para você</h4>
        <!--DICAS 4 -->
        <div class="dicas">
    <?php
            $iFor = 1;
            $class = '';
            foreach ($dica as $b) {
                if ($iFor % 2 == 0) {
                    $class = '';
                } else {

                }
    ?>
                <div class="post <?php echo $class; ?>">
                    <a href="/dicas/view/<?php echo $b['Post']['id']; ?>" title="<?php echo $b['Post']['titulo']; ?>">
                        <img src="/upload/posts/destaque/<?php echo $b['Post']['img_destaque']; ?>" height="90" width="170" alt="Guia de Assinantes da Telefônica" />
                    </a>
                    <p><?php echo $b['Post']['resumo']; ?> <a href="/dicas/view/<?php echo $b['Post']['id']; ?>" title="Veja">Veja</a></p>
                </div>
    <?php
                $iFor++;
            } ?>



        </div>

        <!--MEUS-FAVORITOS-->
        <div id="meus-favoritos" class="favoritosLogado">
            <h4 class="main-title title-meus-favoritos graphic">Meus favoritos</h4>
            <ul class="favoritos">
        <?php
            //debug($favorito);
            foreach ($favorito as $b) {
                $tipo = null;
                if ($b['Post']['tipo'] == 1) {
                    $tipo = 'noticias';
                } elseif ($b['Post']['tipo'] == 2) {
                    $tipo = 'blog';
                } elseif ($b['Post']['tipo'] == 3) {
                    $tipo = 'livros';
                }elseif ($b['Post']['tipo'] == 4) {
                    $tipo = 'dicas';
                }
        ?>
                <li class="clearMarginRight"><a href="/<?php echo $tipo; ?>/view/<?php echo $b['Post']['id']; ?>" title=""><?php echo $this->Texto->truncate($b['Post']['titulo'], 70, '...'); ?></a></li>

        <?php } ?>
        </ul>
        <div class="linhaFav">
            <a href="/favoritos/" title="+ Meus favoritos">+ Meus favoritos</a>
        </div>
    </div><!--/MEUS-FAVORITOS-->
    </div>
    <div id="sidebar" class="mb49">
    <?php echo $this->element('enquete'); ?>
    <?php echo $this->element('rss'); ?>
    <?php echo $this->element('banner'); ?>
</div>