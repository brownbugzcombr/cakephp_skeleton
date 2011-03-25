<div id="content-all">
    <h4 class="main-title title-rss graphic">RSS</h4>
    <p class="mb15 rssP">
    	<strong>RSS</strong> é a sigla em inglês para <em>Rich Site Summary</em> ou <em>Really Simple Syndication</em>,
    	ou seja, uma forma simplificada de apresentar o conteúdo de um site. Trata-se de um formato de distribuição de informações pela
    	internet. Os documentos RSS também são chamados de <em>Feeds</em>.
    </p>
    <p class="rssP"><strong>Ao usar o RSS, você fica sabendo imediatamente quando uma informação de seu interesse é publicada.</strong></p>
    <!--SAIBA-USAR-->
    <div id="content-middle">
        <h2><strong>Saiba como usar</strong></h2>
        <div class="saiba-usar">
            <div class="ordem-list">1</div>
            <h3>Primeiro Passo</h3>
            <p class="rssPpx">Os sites que disponibilizam RSS exibem um link ou uma imagem alaranjada que identifica o serviço:</p>
            <div class="ordem-list">2</div>
            <h3>Segundo Passo</h3>
            <p class="rssPpx">Para usar o serviço gratuitamente selecione as opções listadas ao lado.</p>
            <div class="ordem-list">3</div>
            <h3>Terceiro Passo</h3>
            <p class="rssPpx">Em seguida, você será direcionado para a página codificada, que vai ter o resumo das notícias em formato de link para você escolher e clicar na sua preferida.</p>
            <div class="ordem-list">4</div>
            <h3>Quarto Passo</h3>
            <p class="rssPpx">Pronto! O RSS será automaticamente salvo na pasta dos seus Favoritos. E você vai acompanhar de perto cada novidade publicada neste Feed.</p>
        </div>
    </div><!--/SAIBA-USAR-->
    <!--NOSSOS-CANAIS-->
    <div id="content-middle-left">
        <h2><strong>Nossos Canais</strong></h2>
        <p class="rssP">Aqui no portal <strong>SUA EMPRESA, NOSSO NEGÓCIO</strong>, você também pode escolher seu RSS. Criamos vários canais, para que você possa acompanhar as notícias que mais interessam para a sua empresa. Confira:</p>
        <div class="nossos-canais">
            <h3>Notícias</h3>
            <ul class="feed">
                <?php
                $iEach = 1;
                foreach ($dados as $id => $tit) {
                    $class = '';
                    if ($iEach == 3) {
                        $class = 'last-margin';
                        $iEach = 1;
                    }
                ?>
                    <li class="<?php echo $class; ?>"><a href="/posts/rss/1/<?php echo $id; ?>" title=""><?php echo $tit; ?></a></li>
                <?php
                    $iEach++;
                }
                ?>
            </ul>
        </div>
    </div><!--/NOSSOS-CANAIS-->
</div>