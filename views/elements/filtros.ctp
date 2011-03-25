<form id="filtros">
    <label for="categorias">Filtros:</label>
    <?php
    $class = array('1' => array('class' => 'checar cfiltros'), '2' => array('class' => 'checar cfiltros'), '3' => array('class' => 'checar cfiltros'));
    if (isset($this->params['named']['conteudo'])) {
        $select = explode(',', $this->params['named']['conteudo']);
        foreach ($select as $id => $valor) {
            $class[$valor] = array('class' => 'checado cfiltros');
        }
    } else {
        $this->params['named']['conteudo'] = null;
    } ?>
    <?php
    if (!isset($this->params['named']['categoria'])) {
        $this->params['named']['categoria'] = null;
    }
    ?>
    <p class="materiais">
        <?php
        if ($class[1]['class'] == 'checar cfiltros') {
            echo $this->Html->link('Matérias', array('action' => 'index', 'conteudo' => $this->params['named']['conteudo'] . '1,', 'categoria' => $this->params['named']['categoria']), $class[1]);
        } else {
            echo $this->Html->link('Matérias', array('action' => 'index', 'conteudo' => str_replace('1,', '', $this->params['named']['conteudo']), 'categoria' => $this->params['named']['categoria']), $class[1]);
        }
        ?>
    </p>
    <p class="podcasts">
        <?php
        if ($class[3]['class'] == 'checar cfiltros') {
            echo $this->Html->link('Podcasts', array('action' => 'index', 'conteudo' => $this->params['named']['conteudo'] . '3,', 'categoria' => $this->params['named']['categoria']), $class[3]);
        } else {
            echo $this->Html->link('Podcasts', array('action' => 'index', 'conteudo' => str_replace('3,', '', $this->params['named']['conteudo']), 'categoria' => $this->params['named']['categoria']), $class[3]);
        }
        ?>

    </p>
    <p class="videos">
        <?php
        if ($class[2]['class'] == 'checar cfiltros') {
            echo $this->Html->link('Vídeos', array('action' => 'index', 'conteudo' => $this->params['named']['conteudo'] . '2,', 'categoria' => $this->params['named']['categoria']), $class[2]);
        } else {
            echo $this->Html->link('Vídeos', array('action' => 'index', 'conteudo' => str_replace('2,', '', $this->params['named']['conteudo']), 'categoria' => $this->params['named']['categoria']), $class[2]);
        }
        ?>
    </p>
</form>
