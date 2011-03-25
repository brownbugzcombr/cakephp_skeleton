<div class="clear"></div>
<div class="pagination">
    <div class="paginacao">
        <?php
        $paginator->options(array('url' => $this->passedArgs));
        if ($paginator->hasPrev()) {
            echo $paginator->prev($this->Html->image('seta_voltar.png'), array('escape' => false), false, array('separator' => '', 'escape' => false));
        }
        echo $paginator->numbers(array('separator' => ''));
        if ($paginator->hasNext()) {
            echo $paginator->next($this->Html->image('seta_avancar.png'), array('escape' => false), false, array('separator' => '', 'escape' => false));
        }
        ?>
    </div>
</div>
<div class="clear"></div>