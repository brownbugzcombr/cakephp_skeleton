<?php
$postsModel = ClassRegistry::init('Post');
$posts = $postsModel->find('all', array(
            'conditions' => array(
                'Post.tipo' => $tipo
            ),
            'limit' => '5'
        ));

$i = 1;
$controll = null;
if ($tipo == 1) {
    $controll = 'noticias';
} elseif ($tipo == 2) {
    $controll = 'blog';
} elseif ($tipo == 3) {
    $controll = 'livros';
}
?>

<div id="veja-tb">
    <h4 class="main-title title-veja graphic">Veja Também</h4>
    <?php foreach ($posts as $post) {
 ?>
        <dl class="<?php
        $i == 4 ? $class = 'last-margin' : $class = '';
        $i++;
        echo $class;
    ?>">
        <dt><a href="/<?php echo $controll; ?>/view/<?php echo $post['Post']['id']; ?>"><?php echo $post['Post']['titulo']; ?></a></dt>
        <dd class="sub"><?php echo $this->Texto->truncate($post['Post']['resumo'], 60, '...'); ?> </dd>
            <!-- dd><img height="64" width="107" src="<?php echo '/upload/posts/destaque/thumb/vejaTambem/' . $post['Post']['img_destaque']; ?>"></dd -->
        </dl>
    <?php
        if ($class != '') {
            $i = 1;
        };
    }
    ?>
</div>
