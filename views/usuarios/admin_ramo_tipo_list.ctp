<h3>Tipos de Ramos de Atividade Listagem Quick Edit</h3>
<hr>
<table id="ramosEdit" width="75%">
    <tr>
        <th><?php echo$this->Paginator->sort('ID', 'id') ?></th>
        <th><?php echo$this->Paginator->sort('Atividade', 'ramo_atividade_id') ?></th>
        <th><?php echo$this->Paginator->sort('Descrição', 'desc') ?></th>
        <th style="width:100px;"><?php echo$this->Paginator->sort('Status', 'onoff') ?></th>
    </tr>
    <?php
    $l=0;
    foreach ($dados as $campo) {
        $l++;
        e('<tr>');
        e('	<td alt="id">' . $campo['RamoTipo']['id'] . '</td>');
        e('	<td class="ram_at_" alt="' . $campo['RamoTipo']['id'] . '">' . $atvd[$campo['RamoTipo']['ramo_atividade_id']] . '</td>');
        e('	<td class="ram_at" tabindex='.$l.' alt="' . $campo['RamoTipo']['id'] . '">' . $campo['RamoTipo']['desc'] . '</td>');
        e('	<td class="ram_at2" alt="' . $campo['RamoTipo']['id'] . '">' . ($campo['RamoTipo']['onoff'] == '1' ? "Publicado" : "Offline") . '</td>');
        e('</tr>');
    }
    ?>
    <!-- Shows the page numbers -->


    <!-- Shows the next and previous links -->
    <tr>
        <td style="text-align:left">
            <?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
        </td>
        <td style="text-align:center" colspan="2"><?php echo $this->Paginator->numbers(); ?></td>
        <td style="text-align:right">
            <?php echo $this->Paginator->next('Próxima »', null, null, array('class' => 'disabled')); ?>
        </td>
    </tr>
    <!-- prints X of Y, where X is current page and Y is number of pages -->
    <tr>
        <td colspan="3" style="text-align:right"><?php echo $this->Paginator->counter(); ?></td>
    </tr>
</table>
<style>
    .goodUpdate{
        background:#3f3;
    }
    #ramosEdit #id{
        width:30px;
    }
    #ramosEdit #desc{
        width:300px;
    }
    #ramosEdit #onoff{
        width:30px;
    }

</style>
<script>
    $('.ram_at').click(function (){
        inpt = "<input id='desc' value='" + $(this).text() + "'>";
        inpt += "<input type='hidden' id='desc_old' value='" + $(this).text() + "'>";
        inpt += "<input type='hidden' id='id_old' value='" + $(this).attr('alt') + "'>";
	
        $(this).empty().html(inpt);
        $('#desc').keyup(function(e) {
            if (e.which == 13) { $('#desc').blur() }    // enter (works as expected)
            if (e.which == 27) {
                valk = $('#desc_old').val();
                $('#desc').parent().empty().html(valk)
            }  // esc   (does not work)
        });

        $('#desc').focus().blur(function(){
            var k = $(this).parent();
		
            var kvi = $('#id_old').val();
            var kvo = $('#desc_old').val();
            var kv = $('#desc').val();
		
            if (kv==''){
                out = kvo;
            }else{
                out=kv;
            }
            //submit things
            data = {'id':kvi,'desc':out};
            $.ajax({
                type: 'POST',
                url: "<?php echo $this->Html->url(array("controller" => "usuarios", "action" => "admin_ramo_tipo_list_save")); ?>",
                //                  url: "http://localhost/skel/admin/usuarios/ramo_tipo_list_save",
                data: data,
                success: function(d){
                    k.empty().html(out).attr({'style':'color:green'});
                },
                error: function(){
                    out = kvo;
                    k.empty().html(out).attr({'style':'color:red'});
                },
                dataType: "json"
            });
        });
    });

    $('.ram_at2').click(function (){
        var k = $(this);
        var stat = $(this).text();
        var id = $(this).attr('alt');
        out=(stat=="Publicado"?0:1);
        outt=(out==1?"Publicado":"Offline");
        //submit things
        data = {'id':id,'onoff':out};
        $.ajax({
            type: 'POST',
            url: "<?php echo $this->Html->url(array("controller" => "usuarios", "action" => "admin_ramo_tipo_list_save")); ?>",
            data: data,
            success: function(d){
                k.empty().html(outt).attr({'style':'color:green'});
            },
            error: function(){
                out = stat;
                k.empty().html(outt).attr({'style':'color:red'});
            },
            dataType: "json"
        });
    });
</script>
