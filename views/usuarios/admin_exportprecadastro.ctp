<?php
$counter = 0;
foreach ($dados as $d) {
    $campos = array_keys($d['Precadastro']);
    if ($counter == 0) {
        foreach ($campos as $c) {
            $this->Csv->addField($c);
        }
        $csv->endRow();
    }
    $csv->addRow($d['Precadastro']);
    $counter++;
}
echo $this->Csv->render('usuarios');
?>
