<form id="categorias">
    <label for="categorias">Categorias:</label>
    <p class="todosCat"><?php    	if (!isset($this->params['named']['conteudo'])) {    	    $this->params['named']['conteudo'] = null;    	}    	echo $this->Html->link('Todos', array('action' => 'index', 'conteudo' => $this->params['named']['conteudo']), array());    	?></p>
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
            <p><?php echo $this->Html->link($titulo, array('action' => 'index', 'categoria' => $this->params['named']['categoria'] . $id . ','), array('class' => 'checar')); ?></p>
    <?php } else {
    ?>
            <p><?php echo $this->Html->link($titulo, array('action' => 'index', 'categoria' => str_replace($id . ',', '', $this->params['named']['categoria'])), array('class' => 'checado')); ?></p>
    <?php }
    } ?>
</form>