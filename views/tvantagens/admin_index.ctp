<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
    <ul>
        <li><?php echo $this->Html->link('ADICIONAR', "/admin/tvantagens/add/"); ?></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0" id="tvantagem">

        <tbody>
            <tr id="0">
                <!--td width="10"><input type="checkbox" class="check_all"></td-->
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th>Logotipo</th>
                <th><?php echo $paginator->sort('Data', 'created') ?></th>
                <th><?php echo $paginator->sort('Ordem', 'ordem') ?></th>
                <td>&nbsp;</td>
            </tr>
            <?php foreach ($dados as $d) {
            ?>
                <tr id="<?php echo $d['Tvantagem']['id']; ?>" class="tDnD_whileDrag">
                    <!--td><input type="checkbox"></td-->
                    <td><?php echo $d['Tvantagem']['id']; ?></td>
                    <td><?php echo '<img src="/upload/tvantagem/' . $d['Tvantagem']['logotipo'] . '" />'; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($d['Tvantagem']['created'])); ?></td>
                    <td><?php echo $d['Tvantagem']['ordem']; ?></td>
                    <td class="delete">
                    <?php echo $this->Html->link('Editar', array('action' => 'add', $d['Tvantagem']['id']), array()); ?>
                    <?php echo $this->Html->link('Deletar', array('action' => 'del', $d['Tvantagem']['id']), array(), "Tem certeza que deseja deletar este registro?"); ?>
                </td>
            </tr>
            <?php } //foreach clientes  ?>
            </tbody>
        </table>
    <?php echo $this->Element('pagination'); ?>
</div>
<script type="text/javascript">
    $('#tvantagem').tableDnD({
        onDrop: function(table, row) {
            stringtotal = $('#tvantagem').tableDnDSerialize();
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
                url: '/admin/tvantagens/ordem/',
                data: (
                {
                    'data[Tventagem][ordem]' : meuArray
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