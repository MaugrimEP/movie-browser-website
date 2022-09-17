<?php
function importJavascriptShow(){
	echo "<script src='./js_jquery/jquery.js'></script>
	<script>
			$(function(){
				$('#search_bar').keyup(function(){
					var param = 'recherche=' + $('#search_bar').val();
					$('#proposition_recherche').load('./js_jquery/header_javascript.php',param);
				});
			});
			</script>";
}
?>
