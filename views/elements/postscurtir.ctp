<?php if (isset($LoginUsuario)) { ?>
    <ul class="compartilhe">
        <li class="facebook"><a title="Facebook" class="graphic" href="http://www.facebook.com/sharer.php?u=http://<?php echo $_SERVER["HTTP_HOST"] . $this->Html->url(array('action' => 'index', $dado['Post']['id'])); ?>&t=<?php echo urlencode('Muito interessante este artigo') ?>" target="_blank">Facebook</a></li>
        <li class="twitter"><a title="Facebook" class="graphic twitter" href="http://twitter.com/home?status=Neste momento estou lendo http://<?php echo $_SERVER["HTTP_HOST"] . $this->Html->url(array('action' => 'index', $dado['Post']['id'])); ?>" target="_blank">Twitter</a></li>
    </ul>
    <ul class="curtir">

        <li class="gostei"><a href="javascript:void(null)" onclick="gostei(<?php echo $dado['Post']['id']; ?>, 1)" title="Gostei">Gostei</a></li>
        <li class="nao-gostei"><a href="javascript:void(null)" onclick="gostei(<?php echo $dado['Post']['id']; ?>, 0)" class="graphic" title="Não Gostei">Não Gostei</a></li>

    </ul>
<?php } ?>