<?php 
	$controllerName = strtolower($this->name ); 
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
    <ul>
        <li></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0">

        <tbody>
            <tr>
                <!--td width="10"><input type="checkbox" class="check_all"></td-->
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th><?php echo $paginator->sort('Texto', 'texto') ?></th>
                <th><?php echo $paginator->sort('Data', 'created') ?></th>
                <td>&nbsp;</td>
            </tr>
            <?php 
            if(isset($dados) && is_array($dados) && count($dados) > 0){
            foreach ($dados as $d) {

            ?>
                <tr>
                    <!--td><input type="checkbox"></td-->
                    <td><?php echo $d['Oportunidade']['id']; ?></td>
                    <td>
                        <strong><?php echo $d['Oportunidade']['titulo']; ?></strong><br />
                    <?php echo $d['Oportunidade']['texto']; ?>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($d['Oportunidade']['created'])); ?></td>
                    <td class="delete">
					<?php echo $this->Html->link('Deletar',array('action' => 'del', $d['Oportunidade']['id']),array(),"Tem certeza que deseja deletar este registro?");?>
                    </td>
                </tr>
            <?php }} //foreach clientes  ?>
        </tbody>
    </table>
    <?php echo $this->Element('pagination'); ?>
</div>
