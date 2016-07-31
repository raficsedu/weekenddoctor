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