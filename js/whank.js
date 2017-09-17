jQuery(document).ready(function($){
/*Ajax functions*/
	$(document).on('click','.whank-ajax-load',function(){
		var that = $(this);
		var page = $(this).data('page');
		var newPage = page+1;
		var ajaxurl =$(this).data('url');

		$.ajax({
			url :ajaxurl,
			type :'post',
			data : {

				page : page, /*variable name*/
				action : 'whank_load_more',
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				that.data('page', newPage);
				$('.whank-posts-container').append( response );
			}
		});
	});

});
