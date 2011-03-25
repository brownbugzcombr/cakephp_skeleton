<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2>Pesquisa Cultural - Perguntas</h2>
    
    <ul>
        <li><?php echo $this->Html->link('ADICIONAR', "/admin/perguntas/add/".$this->params['pass']['0']); ?></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0" id="perguntas">

        <tbody>
            <tr>
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th><?php echo $paginator->sort('Texto', 'pergunta_cultural') ?></th>
                <th><?php echo $paginator->sort('Ordem', 'ordem') ?></th>
                <th><?php echo $paginator->sort('Data', 'created') ?></th>
                <td>&nbsp;</td>
            </tr>
            <?php
            if (isset($dados) && is_array($dados) && count($dados) > 0) {
                foreach ($dados as $d) {
            ?>
                    <tr>

                <td><?php echo $d['Pergunta']['id']; ?></td>
                <td>
                    <?php echo $this->Html->link($d['Pergunta']['pergunta'], array('controller' => 'perguntas', 'action' => 'add', $d['Pesquisa']['id'], $d['Pergunta']['id']), array()); ?>
                </td>
                <td><?php echo $d['Pergunta']['ordem']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($d['Pergunta']['created'])); ?></td>
                <td class="delete">
                    <?php echo $this->Html->link('Deletar', array('action' => 'del', $d['Pesquisa']['id']), array(), "Tem certeza que deseja deletar este registro?"); ?>
                </td>
            </tr>
            <?php }
            } //foreach clientes   ?>
        </tbody>
    </table>
    <?php echo $this->Element('pagination'); ?>
</div>
<script type="text/javascript">
    $('#perguntas').tableDnD({
        onDrop: function(table, row) {
            stringtotal = $('#perguntas').tableDnDSerialize();
            array1 = stringtotal.split("&");
            var meuArray = new Array();
            var ii = 0;
            $.each(array1, function(index, value) {
                val = value.replace('tvantagem[]=',"");
                if(val>0 && !isNaN(val)){
                    meuArray[ii] = val;
                }
                ii++;
            });
            $.ajax({
                type: "POST",
                url: '/admin/perguntas/ordem/',
                data: (
                {
                    'data[Pergunta][ordem]' : meuArray
                }),

                success: function(data) {
                    if(data == 1){
                        window.location = window.location;
                    }else{
                        alert('Problema ao salvar os dados ');
                    }
                }
            });
        }

    });

    $("#tvantagem tr").hover(function() {
        $(this).addClass('showDragHandle');
    }, function() {
        $(this).removeClass('showDragHandle');
    });

</script>