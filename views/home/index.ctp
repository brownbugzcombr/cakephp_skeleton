<div id="servicos">
    <div class="servico-sua-empresa">
        <a href="/home/sobreoportal/" title="Sua Empresa, Nosso Negócio">
            <img src="/img/home_deslogada.jpg" alt="Sua Empresa, Nosso Negócio" height="260" width="295" />
        </a>
        <h2 class="ajusteHomeTitulos"><a href="/home/sobreoportal/" class="ajusteHomeTitulos">Você conhece os benefícios do portal SUA EMPRESA, NOSSO<br />NEGÓCIO?</a></h2>
        <p>A <strong>Telefônica Negócios</strong> traz exclusivamente para você, que é nosso cliente, o portal digital <span class="ajusteHomeTitulos">SUA EMPRESA, NOSSO NEGÓCIO</span>. Um site interativo e seguro, que oferece informação de qualidade, treinamentos, oportunidades, aplicativos, parcerias e muito mais. Tudo para a sua empresa crescer com sucesso e conectada com o mundo dos negócios. <a href="/home/sobreoportal/" title="Saiba mais">Saiba mais</a></p>
        <span class="link-button"><a href="/usuarios/precadastro/" title="Cadastre-se já gratuitamente!">Cadastre-se já gratuitamente!</a></span>
    </div>
    <div class="servico-telefonica-negocios">
        <h2 class="ajusteHomeTitulos"><a href="/home/negocios/" class="ajusteHomeTitulos">Na hora de ampliar a sua empresa, conte com a<br /><span>Telefônica Negócios</span>!</a></h2>
        <a href="/home/negocios/"><img src="/img/solucoes-02.jpg" alt="computador + banda larga ou acesso de dados + manutençao profissional" title="Telefônica Negócios" height="85" width="350" /></a>
        <p>Para atender às necessidades da sua empresa, a Telefônica Negócios oferece as mais completas soluções em <strong>Voz, Dados, Internet, Informática e atendimento personalizado</strong>, com <strong>suporte técnico 24 horas por dia</strong>. Simplifique agora seu dia a dia! Conheça os produtos e serviços da Telefônica Negócios. <a href="/home/negocios/" title="Clique e saiba mais."><br /><strong>Clique e saiba mais.</strong></a></p>
    </div>
</div>
<div id="content" class="contenthome">
    <!--NEWS-DESLOGADA-->
    <div class="news-deslogada">

        <h3>Notícias</h3>
        <div class="outras-noticias">
            <!--NOTICIA-DESLOGADA-->
            <div class="post">
                <h2><a class="ajusteHomeTitulos" href="/noticias/view/<?php echo $not[0]['Post']['id'] ?>" title="&raquo; Leia mais"><?php echo $not[0]['Post']['titulo'] ?></a></h2>
                <p><?php echo $not[0]['Post']['resumo'] ?></p>
                <a href="/noticias/view/<?php echo $not[0]['Post']['id'] ?>" title="&raquo; Leia mais">&raquo; Leia mais</a>
            </div>

            <div class="post">
                <h2><a class="ajusteHomeTitulos" href="/noticias/view/<?php echo $not[1]['Post']['id'] ?>" title="&raquo; Leia mais"><?php echo $not[1]['Post']['titulo'] ?></a></h2>
                <p><?php echo $not[1]['Post']['resumo'] ?></p>
                <a href="/noticias/view/<?php echo $not[1]['Post']['id'] ?>" title="&raquo; Leia mais">&raquo; Leia mais</a>
            </div>
        </div>

         <h3>Blog</h3>
        <!--NOTICIA-DESLOGADA-->

        <div class="post">
            <!--POST-IMAGEM-->
            <?php if (!empty($blog['Post']['img_destaque'])) {
            ?>
                <div class="post-img">
                    <a href="/blog/view/<?php echo $blog['Post']['id'] ?>" title="<?php echo $blog['Post']['titulo'] ?>">
                        <img src="/upload/posts/destaque/<?php echo $blog['Post']['img_destaque'] ?>" alt="<?php echo $blog['Post']['titulo'] ?>" height="112" width="168" />
                    </a>
                </div>
            <?php } ?>
            <!--POST-CONTEUDO-->
            <div class="post-content">
                <h2><a class="ajusteHomeTitulos" href="/blog/view/<?php echo $blog['Post']['id'] ?>" title="&raquo; Leia mais"><?php echo $blog['Post']['titulo'] ?></a></h2>
                <p><?php echo $blog['Post']['resumo'] ?></p>
                <a href="/blog/view/<?php echo $blog['Post']['id'] ?>" title="&raquo; Leia mais">&raquo; Leia mais</a>
            </div><!--/POST-CONTEUDO-->
        </div>

        <!--span class="link-button"><a href="/noticias/" title="Ver todas">Ver todas</a></span -->
    </div><!--/NEWS-DESLOGADA-->
    <!--DESLOGADA-LATERAL-->
    
    <!--DESLOGADA-LATERAL-->
    <div class="sidebar-deslogada">
        <h3>Conheça o Portal</h3>
        <div class="post">
            <h2><a class="ajusteHomeTitulos" href="<?php echo $this->Html->url(array('action'=>'sobreoportal'));?>">Diretor Executivo da Telefônica Negócios apresenta o portal</a></h2>
        	<a href="<?php echo $this->Html->url(array('action'=>'sobreoportal'));?>"><img src="/img/video-conheca-o-portal.jpg" alt="" /></a>
        </div>

    </div><!--DESLOGADA-LATERAL-->
    <div class="sidebar-deslogada">
        <h3>Como fazer</h3>
        <div class="post">
            <h2><a class="ajusteHomeTitulos" href="/usuarios/precadastro/">Configure uma rede wi-fi</a></h2>
            <a href="/usuarios/precadastro/"><img src="/img/home_redewifi.jpg" width="220" height="152" alt="Configure uma rede wi-fi" title="Configure uma rede wi-fi" /></a>
        </div>
    </div><!--DESLOGADA-LATERAL-->

    <!--PARCEIROS-->
    <h4 class="main-title-parceiros"></h4>
    <div class="parceiros parceirosHome">
        <?php
        	foreach ($tvant as $t) {

        		if($t['Tvantagem']['logotipo'] != '') {
        ?>
                <span>
                    <a href="/usuarios/precadastro" title="">
                        <img src="/upload/tvantagem/thumb/home/<?php echo $t['Tvantagem']['logotipo']; ?>" alt="" />
                    </a>
                </span>
        <?php 	}
        	} ?>
        <a href="/tvantagens/" title="">Confira aqui todas as empresas parceiras!</a>
    </div><!--PARCEIROS-->
</div><!--/CONTEUDO-->
<div id="sidebar">
	<?php echo $this->element('banner'); ?>
</div>