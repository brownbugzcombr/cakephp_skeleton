<?php
$controllerName = strtolower($this->name);
?>
<div class="block_head">
    <div class="bheadl"></div>
    <div class="bheadr"></div>
    <h2><?php echo $this->name; ?></h2>
</div>
<div class="block_content">
    <form action="<?php echo $this->Html->url(array('controller' => $controllerName, 'action' => 'add')); ?>" enctype="multipart/form-data" method="POST">
        <p>
            <label>Texto:</label><br>
            <?php echo $this->Form->hidden('Tvantagem.id'); ?>
            <?php echo $this->Form->textarea('Tvantagem.nome', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Url:</label><br>
            <?php echo $this->Form->text('Tvantagem.url', array('class' => 'text big')); ?>
        </p>
        <p>
            <label>Texto pequeno:</label><br>
            <?php echo $this->Form->textarea('Tvantagem.resumo', array('class' => 'text big')); ?>
        </p>
        <p>
            <?php
            if ($this->data['Tvantagem']['logotipo'] != '' && !is_array($this->data['Tvantagem']['logotipo'])) {
                echo '<label>Imagem Destaque Atual:</label><br>';
                echo '<img src="/upload/tvantagem/' . $this->data['Tvantagem']['logotipo'] . '" />';
            }
            ?>
            <br /><br />
            <label>Nova Imagem Destaque:</label><br>
            <?php echo $this->Form->file('Tvantagem.logotipo', array('type' => 'file')); ?>
        </p>
        <p>
            <?php echo $this->Form->submit('Salvar', array('class' => 'submit small')); ?>
            <?php echo $this->Html->link('Cancelar', array('action' => 'index')); ?>
        </p>

    </form>
</div>

<script type="text/javascript">
    //<![CDATA[

    CKEDITOR.replace( 'TvantagemNome',
    {
        stylesSet :
            [
{ name : 'tipoA', element : 'span', styles:{color: '#003399'} },
{ name : 'tipoB', element : 'span', styles:{color: '#0f89df', 'font-size': '15px'} },
{ name : 'tipoC', element : 'span', styles:{color: '#0f89df', 'font-size': '12px'} },



            { name : 'favorito', element : 'span', styles: { color: 'Blue'} },
            { name : 'Emphasis', element : 'em' },

            { name : 'Computer Code', element : 'code' },
            { name : 'Keyboard Phrase', element : 'kbd' },
            { name : 'Sample Text', element : 'samp' },
            { name : 'Variable', element : 'var' },

            { name : 'Deleted Text', element : 'del' },
            { name : 'Inserted Text', element : 'ins' },

            { name : 'Cited Work', element : 'cite' },
            { name : 'Inline Quotation', element : 'q' }
        ],
        toolbar:
            [
            ['Styles']
        ]

    });
    //]]>
    //<![CDATA[

    CKEDITOR.replace( 'TvantagemResumo',
    {
        stylesSet :
            [
{ name : 'tipoA', element : 'span', styles:{color: '#003399'} },
{ name : 'tipoB', element : 'span', styles:{color: '#0f89df', 'font-size': '15px'} },
{ name : 'tipoC', element : 'span', styles:{color: '#0f89df', 'font-size': '12px'} },



            { name : 'favorito', element : 'span', styles: { color: 'Blue'} },
            { name : 'Emphasis', element : 'em' },

            { name : 'Computer Code', element : 'code' },
            { name : 'Keyboard Phrase', element : 'kbd' },
            { name : 'Sample Text', element : 'samp' },
            { name : 'Variable', element : 'var' },

            { name : 'Deleted Text', element : 'del' },
            { name : 'Inserted Text', element : 'ins' },

            { name : 'Cited Work', element : 'cite' },
            { name : 'Inline Quotation', element : 'q' }
        ],
        toolbar:
            [
            ['Styles']
        ]

    });
    //]]>
</script>


