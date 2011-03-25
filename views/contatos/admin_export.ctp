<?php
$counter = 0;
foreach ($dados as $d) {
    $campos = array_keys($d['Contato']);
    if ($counter == 0) {
        foreach ($campos as $c) {
            $this->Csv->addField($c);
        }
        $csv->endRow();
    }
    $csv->addRow($d['Contato']);
    $counter++;
}
echo $this->Csv->render('Contato');
?>
