jQuery(document).ready(function(){
	jQuery.ajax({
		url: "tree_data.php",
		cache: false,
		success: function(response){
			$('#treeview').treeview({data: response});
		}
	});	
});