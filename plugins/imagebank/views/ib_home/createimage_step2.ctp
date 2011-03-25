<?php
if (isset($javascript)):
    echo '<link rel="stylesheet" type="text/css" href="/imagebank/js/jquery.imgareaselect/css/imgareaselect-default.css" />';
    echo $javascript->link('/imagebank/js/jquery.imgareaselect/scripts/jquery.min.js');
    echo $javascript->link('/imagebank/js/jquery.imgareaselect/scripts/jquery.imgareaselect.min.js');
endif;
?> 
<h1>Step2</h1>
<h2>Search and other stuff</h2>

<?php
echo $cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],115,115,array('handles:true'));  
echo $cropimage->createForm($uploaded["imagePath"], 115, 115); 

////echo $form->create('YourModel', array('action' => 'createimage_step3', "enctype" => "multipart/form-data"));
/*echo $form->input('id');
echo $form->hidden('name');
echo $cropimage->createForm($uploaded["imagePath"], 151, 151);
echo $form->submit('Done', array("id" => "save_thumb"));
echo $form->end();
 * 
 */
?> 