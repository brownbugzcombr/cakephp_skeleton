<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $dados['Usuario']['nome']; ?></h2>
    <ul>
        <li></li>
    </ul>
</div>
<div class="block_content">
    <table width="100%" cellspacing="0" cellpadding="0">

        <tbody>
            <?php
                foreach($dados['Contato'] as $campo => $valor){

                ?>
            <tr>
                <td><?php echo $campo; ?></td>
                <td><?php echo $valor; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
