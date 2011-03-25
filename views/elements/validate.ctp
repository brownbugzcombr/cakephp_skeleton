<div class="message warning" id="flashMessage" style="display: block;">
    <p><?php 
	//@todo refatorar, jogar função dentro de um helper
	function showMessage($message){
		foreach($message as $m){
			if(is_array($m)){
				showMessage($m);
			} else {
				echo $m."<br />";
			}
		}
	}
	
	showMessage($message);
		
	?>
</p>
</div>