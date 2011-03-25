<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <title>Sua Empresa, Nosso Negócio</title>
        <link>www.minhaempresanossonegocio.com.br</link>
        <description>Telefônica Negócios</description>
        <language>pt-br</language>
        <pubDate><?php echo date("D, j M Y H:i:s", gmmktime()) . ' GMT'; ?></pubDate>
        <?php echo $time->nice($time->gmt()) . ' GMT'; ?>
        <docs>http://blogs.law.harvard.edu/tech/rss</docs>
        <generator>Telefonica Negocios</generator>
        <managingEditor>faleconosco@suaempresanossonegocio.com.br</managingEditor>
        <webMaster>faleconosco@suaempresanossonegocio.com.br</webMaster>
        <?php foreach ($dados as $d): ?>
            <item>
                <title><?php echo $d['Post']['titulo']; ?></title>
            <?php
            $tipo = null;
            if ($d['Post']['tipo'] == 1) {
                $tipo = 'noticias';
            } elseif ($d['Post']['tipo'] == 2) {
                $tipo = 'blog';
            } elseif ($d['Post']['tipo'] == 3) {
                $tipo = 'livros';
            }
            ?>
            <link>http://www.minhaempresanossonegocio.com.br/<?php echo $tipo; ?>/view/<?php echo $d['Post']['id']; ?></link>
            <description><?php echo $d['Post']['resumo']; ?></description>
            <?php echo $time->nice($d['Post']['created']) . ' GMT'; ?>
            <pubDate><?php echo $time->nice($time->gmt($d['Post']['updated'])) . ' GMT'; ?></pubDate>
            <guid>http://www.minhaempresanossonegocio.com.br/<?php echo $tipo; ?>/view/<?php echo $d['Post']['id']; ?></guid>
        </item>
        <?php endforeach; ?>
    </channel>
</rss>