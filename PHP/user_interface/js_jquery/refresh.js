$(function(){
	$('#search_bar').keypress(function(){
		var param = "recherche=" + $('#proposition_recherche').val();
		$('#proposition_recherche').load('header_javascript.php',param);
	});
});
