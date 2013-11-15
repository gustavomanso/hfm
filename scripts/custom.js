// JavaScript Document


$(document).ready(function(){
			
	
	var video = document.getElementById('video');
	video.addEventListener('click',function(){
	  video.play();
	},false);
		
});

$(window).load(function() {

	$('.post-expand').click(function(){
		$(this).parent().parent().find('.post-expand-body').toggle();
		return false;
	});
	
	$('.file-open').click(function(){
		$(this).parent().find('.player-show').toggleClass('showPlayer');
		$(this).parent().find('.file-show').toggle();
		 return false;
	});
	
	$('.nav-deploy').click(function(){
		$('.nav-arrow').toggleClass('change-arrow');
		$('.nav-items').toggleClass('show-nav');
	});

	$('.checkbox').click(function(){
		$(this).toggleClass('selected-checkbox');
		return false;
	});
	
	$('.checkbox2').click(function(){
		$(this).toggleClass('selected-checkbox2');
		return false;
	});
	
	$('.radiobox').click(function(){
		$(this).toggleClass('selected-radiobox');
		return false;
	});
	
	$('.radiobox2').click(function(){
		$(this).toggleClass('selected-radiobox2');
		return false;
	});
	
	$('.itoggle').click(function(){
		$(this).toggleClass('itoggle-active');
		$(this).parent().find('.itoggle-content').toggle(100);
		return false;
	});
	
	$('.content-toggle-deploy').click(function(){
		$(this).toggleClass('content-toggle-deploy-active');
		$(this).parent().find('.toggle-content').toggle(200);
		return false;
	});
	
	$(".notification-quit-red").click(function(){
	  $(".notification-box-red").fadeOut("slow");
	  return false;
	});
	
	$(".notification-quit-green").click(function(){
	  $(".notification-box-green").fadeOut("slow");
	  return false;
	});
	
	$(".notification-quit-yellow").click(function(){
	  $(".notification-box-yellow").fadeOut("slow");
	  return false;
	});
	
	$(".notification-quit-blue").click(function(){
	  $(".notification-box-blue").fadeOut("slow");
	  return false;
	});
	
});
