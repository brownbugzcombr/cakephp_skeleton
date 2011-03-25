<div class="clear"></div>
<div id="pagination" class="pagination right">
    <?php
    $paginator->options(array('url' => $this->passedArgs));
    echo $paginator->prev('< ', null, null, array('separator' => ''));
    echo $paginator->numbers(array('separator' => ''));
    echo $paginator->next(' >', null, null, array('separator' => ''));

    ?>
</div>
<div class="clear"></div>