$(document).ready(function(){
	var width=$('.productDisplay').width();
	var height=width*0.75;
	$('.productDisplay').height(height);
	$(window).resize(function(){
		var newWidth=$('.productDisplay').width();
		var newHeight=newWidth*0.75;
		$('.productDisplay').height(newHeight);
	});
	if(screen.width>=950)
		{
		$('.productDisplay').mouseenter(function(){
			$(this).children('div.productInfo').slideDown('fast');
		});
		$('.productDisplay').mouseleave(function(){
			$(this).children('div.productInfo').slideUp('fast');
		});
		}
	$('.productDisplay').click(function(){
		var imageID=$(this).attr('id');
		$('#productDetails').load('productDetails.php?imageID='+imageID,'', function(){
			$('#productDetails').fadeIn('fast');
		});
	});
});