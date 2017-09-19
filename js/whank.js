jQuery(document).ready(function($){
/*variable decleration*/
var last_scroll =0;

/*Ajax functions*/
	$(document).on('click','.whank-ajax-load:not(.loading)',function(){
		var that = $(this);
		var page = $(this).data('page');
		var newPage = page+1;
		var ajaxurl =$(this).data('url');

		// Adding dynamic class after clicking the btn for animation
		that.addClass('loading').find('.text').slideUp(320);
		that.find('.fa-refresh').addClass('spin');

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
				setTimeout(function(){ //js function to delay
					that.data('page', newPage);
					$('.whank-posts-container').append( response );
					//Removing the loading class to prevent block
					
						that.removeClass('loading').find('.text').slideDown(320);
						that.find('.fa-refresh').removeClass('spin');

				}, 3000);
				
			}
		});
	});

	/*scroll function*/
	$(window).scroll( function(){
		var scroll = $(window).scrollTop();
		
		if ( Math.abs( scroll - last_scroll ) > $(window).height()*0.1 ){
			last_scroll = scroll;
			$('.page-limit').each( function( index ){
				if ( isVisible ($(this))) {
					history.replaceState( null,null, $(this).attr("data-page") );
					return (false);
				}
			} );
		}
	});

	function isVisible( element ){
		var scroll_pos = $(window).scrollTop();
		var window_height = $(window).height();
		var el_top = $(element).offset().top;
		var el_height = $(element).height();
		var el_bottom = el_top + el_height;
		return ( (el_bottom- el_height * 0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5+window_height ) ) );
	}
});
