$(document).ready(function() {
	$('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
		effect: 'fade',
		testMode: true,
		onChange: function(evt){
			
		}
	});
	
	$(".menuIcon").click(function(){
		var navigationHtml = $('.navigation').html();
		$('.mobNav ul').html(navigationHtml);
		$(this).parents().find('.mobNav').slideToggle(); 			
		return false;
	}); 
	
	$(".srchBtn").click(function(){
		//alert('hi');
		$('.mobSrchBox').toggle();
	}); 

});

$(document).on('click','.see_more',function(e){
    e.preventDefault();

    var elem_id = $(this).attr('doctor-id');

    //Hiding the More Button
    $('.remove-'+elem_id).remove();

    //Expanding the hided Time Slots
    $('.hide_me').each(function(){
        if($(this).hasClass(elem_id)){
            $(this).removeClass('hide_me');
        }
    });
});