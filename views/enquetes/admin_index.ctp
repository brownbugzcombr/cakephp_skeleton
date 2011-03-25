<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
    <ul>
        <li><?php echo $this->Html->link('ADICIONAR', "/admin/{$controllerName}/add/"); ?></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0">

        <tbody>
            <tr>
                <!--td width="10"><input type="checkbox" class="check_all"></td-->
                <th><?php echo $paginator->sort('Id', 'id') ?></th>
                <th><?php echo $paginator->sort('Pergunta', 'pergunta') ?></th>
                <th><?php echo $paginator->sort('Ativo', 'ativo') ?></th>
                <th><?php echo $paginator->sort('Data', 'created') ?></th>
                <td>&nbsp;</td>
            </tr>
            <?php foreach ($dados as $d) {
            ?>
                <tr>
                    <!--td><input type="checkbox"></td-->
                    <td><?php echo $d['Enquete']['id']; ?></td>
                    <td><?php echo $this->Html->link($d['Enquete']['pergunta'], array('controller' => 'enquetes', 'action' => 'add', $d['Enquete']['id'])); ?></td>
                    <td><?php echo $d['Enquete']['ativo']?></td>
                    <td><?php echo date('d/m/Y', strtotime($d['Enquete']['created'])); ?></td>
                    <td class="delete">
                    <?php echo $this->Html->link('Deletar', array('controller' => 'enquetes', 'action' => 'del', $d['Enquete']['id']), array(), "Tem certeza que deseja deletar este registro?"); ?>
                </td>
            </tr>
            <?php } //foreach clientes  ?>
            </tbody>
        </table>
    <?php echo $this->Element('pagination'); ?>
</div>
