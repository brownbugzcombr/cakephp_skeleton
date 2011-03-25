<?php
$counter = 0;
foreach ($dados as $d) {
    $campos = array_keys($d['Usuario']);
    if ($counter == 0) {
        foreach ($campos as $c) {
            $this->Csv->addField($c);
            //print_r($c);e('<br/>');
        }
        $csv->endRow();
    }
    $csv->addRow($d['Usuario']);
    $counter++;
}
echo $this->Csv->render('usuarios');
?>