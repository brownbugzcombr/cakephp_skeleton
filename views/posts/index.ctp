<!--SIDEBAR-->
<div id="sidebar">
    <div class="categorias">
        <ul class="filtros">
            <li class="filtros-title">Filtros:</li>
            <li class="materiais"><a href="#" title="Matérias">Matérias</a></li>
            <li class="podcasts"><a href="#" title="Podcasts">Podcasts</a></li>
            <li class="videos"><a href="#" title="Vídeos">Vídeos</a></li>
        </ul>
        <form id="categorias">
            <label for="categorias">Categorias:</label>
            <?php
            
            $select = null;
            if (isset($this->params['named']['categoria'])) {
                $select = explode(',', $this->params['named']['categoria']);
            } else {
                $this->params['named']['categoria'] = null;
            }

            foreach ($categorias as $id => $titulo) {
                $link = true;
                if (is_array($select)) {
                    foreach ($select as $id_s) {
                        if ($id_s == $id)
                            $link = false;
                    }
                }
                if ($link) {
            ?>
                    <p><?php echo $this->Html->link($titulo, array('action' => 'index', 'categoria' => $this->params['named']['categoria'] . $id . ',')); ?></p>
            <?php } else {
            ?>
                    <p>> <?php echo $titulo; ?> <?php echo $this->Html->link('X', array('action' => 'index', 'categoria' => str_replace($id . ',', '', $this->params['named']['categoria']))); ?></p>
            <?php }
            } ?>
        </form>
    </div>
</div><!--/SIDEBAR-->
<!--CONTEUDO-->
<div id="content-min">
    <h4 class="main-title title-news graphic">Notícias</h4>
    <!--FAVORITOS-->
    <div id="favoritos">

        <?php 
        debug($dados);
        foreach ($dados as $d) {
        
        ?>
                <div class="post">
                    <a class="post-img" href="#" title="">
                        <img src="img-interface/post-img.jpg" height="135" width="165" />
                    </a>
                    <h2><?php echo $d['Post']['titulo'] ?></h2>
                    <p><?php echo $d['Post']['resumo'] ?></p>
                    <div class="post-info">
                        <a href="#" class="comment-blog" title="">6 comentários</a>
                        <ul class="compartilhe">
                            <li class="facebook"><a href="#" class="graphic" title="Facebook">Facebook</a></li>
                            <li class="twitter"><a href="#" class="graphic twitter" title="Facebook">Twitter</a></li>
                        </ul>
                        <ul class="curtir">
                            <li class="gostei"><a href="#"title="Gostei">Gostei</a></li>
                            <li class="nao-gostei"><a href="#" class="graphic" title="Não Gostei">Não Gostei</a></li>
                        </ul>
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
    <h4 class="main-title title-enquete graphic">Dicas para você</h4>
    <form id="enquete">
        <label for="enquete">Qual tipo de conteúdo você gostaria de acessar aqui no site?</label>
        <p><input type="radio" name="enquete" value="Marketing e Vendas" />Marketing e Vendas</p>
        <p><input type="radio" name="enquete" value="Administração" />Administração</p>
        <p><input type="radio" name="enquete" value="Finanças" />Finanças</p>
        <p><input type="radio" name="enquete" value="RH" />RH</p>
        <p><input type="radio" name="enquete" value="TI" />TI</p>
        <span class="link-button"><input type="submit" name="enviar-enquete" value="Enviar" /></span>
    </form>
    <div id="rss">
        <p>
            <a href="#" class="assine" title="Assine nosso RSS">Assine nosso RSS</a>
            <span><a href="#" title="O que é RSS?">(O que é RSS?)</a></span></p>
    </div>
    <img src="img-interface/side-bar-180x420.gif" />
    <img src="img-interface/side-bar-180x420.gif" />
</div><!--/SIDEBAR-->