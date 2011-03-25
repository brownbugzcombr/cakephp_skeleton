<h1>Home page of image bank</h1>
<h2>Search and other stuff</h2>

<form controller="ib_home" enctype="multipart/form-data" id="ib_imagemCreateimageStep2Form" method="post" action="/imagebank/ib_home/createimage_step2" accept-charset="utf-8">
<?php
echo $form->input('titulo');
echo $form->input('imagem', array("type" => "file"));
echo $form->end('Upload');
?> 