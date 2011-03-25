<?php
$controller = $this->params['controller'];
?>
<ul id="nav">
    <li><a href="/" title="Home" <?php if($controller == 'home'){?>class="active"<?php }?>>
            <?php if($controller == 'home'){?><span class="borda"><?php }?>
            Home
            <?php if($controller == 'home'){?></span><?php }?>
        </a>
    </li>
    <li>
        <a href="/noticias/" <?php if($controller == 'noticias'){?>class="active"<?php }?> title="Notícias">
            <?php if($controller == 'noticias'){?><span class="borda"><?php }?>
            Notícias
            <?php if($controller == 'noticias'){?></span><?php }?>
        </a>
    </li>
    <li>
        <a href="/blog/" <?php if($controller == 'blog'){?>class="active"<?php }?> title="Blog">
            <?php if($controller == 'blog'){?><span class="borda"><?php }?>
            Blog
            <?php if($controller == 'blog'){?></span><?php }?>
        </a>
    </li>
    <li>
        <a href="/dicas/" <?php if($controller == 'dicas'){?>class="active"<?php }?> title="Dicas">
            <?php if($controller == 'dicas'){?><span class="borda"><?php }?>
            Dicas
            <?php if($controller == 'dicas'){?></span><?php }?>
        </a>
    </li>
    <li>
        <a href="/oportunidades/" <?php if($controller == 'oportunidades'){?>class="active"<?php }?> title="Ponto de Negócios">
            <?php if($controller == 'oportunidades'){?><span class="borda"><?php }?>
            Ponto de Negócios
            <?php if($controller == 'oportunidades'){?></span><?php }?>
        </a>
    </li>
    <li style="display: none;">
        <a href="/mensagens/" <?php if($controller == 'mensagens'){?>class="active"<?php }?> title="Minhas Mensagens">
            <?php if($controller == 'mensagens'){?><span class="borda"><?php }?>
            Minhas Mensagens <span class="number">(<?php echo $msgnlida; ?>)</span>
            <?php if($controller == 'mensagens'){?></span><?php }?>
        </a>
    </li>
    <!--li><a href="#" title="Pesquisa Premiada">Pesquisa Premiada</a></li-->
    <li>
        <a href="/tvantagens/" <?php if($controller == 'tvantagens'){?>class="active"<?php }?> title="t vantagens Negócios">
            <?php if($controller == 'tvantagens'){?><span class="borda"><?php }?>
            t vantagens Negócios
            <?php if($controller == 'tvantagens'){?></span><?php }?>
        </a>
    </li>
</ul><!--/MENU-PRINCIPAL-->