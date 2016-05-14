var pressed = 0;
$(document).ready(function(e) {
    $(document).on('click','.like_button',function(e){
        var newsID = ($(this).parent().find("#newsID").val());
		rateNews(1,$(this),newsID);
    });
	$(document).on('click','.dislike_button',function(e){
        var newsID = ($(this).parent().find("#newsID").val());
		rateNews(-1,$(this),newsID);
    });
	$(document).on('mouseenter','.like_button',function(e){
		$(this).css('opacity','1');
	});
	$(document).on('mouseenter','.dislike_button',function(e){
		$(this).css('opacity','1');
	});
	$(document).on('mouseleave','.like_button',function(e){
		if(!($(this).parent().find(".post_rate").val()>0)) $(this).css('opacity','0.2');
	});
	$(document).on('mouseleave','.dislike_button',function(e){
		if(!($(this).parent().find(".post_rate").val()<0))$(this).css('opacity','0.2');
	});
	
	var elements = $(".post_category");
	$("#moviesButton").click(function(e){
		if(pressed==1){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=1;showNews('movies');$("body").css('background-color','rgba(0,120,120,0.03)');}
	});
	$("#movies_button_LSC").click(function(e) {
		if(pressed==1){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=1;showNews('movies');$("body").css('background-color','rgba(0,120,120,0.03)');}
	});
    $("#cartoonsButton").click(function(e){
		if(pressed==2){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=2;showNews('cartoons');$("body").css('background-color','rgba(255,0,255,0.08)');}
	});
	$("#cartoons_button_LSC").click(function(e) {
    	if(pressed==2){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=2;showNews('cartoons');$("body").css('background-color','rgba(255,0,255,0.08)');}
	});
	$("#animeButton").click(function(e){
		if(pressed==3){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=3;showNews('anime');$("body").css('background-color','rgba(0,255,0,0.08)');}
	});
	$("#anime_button_LSC").click(function(e) {
    	if(pressed==3){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=3;showNews('anime');$("body").css('background-color','rgba(0,255,0,0.08)');}
	});
	$("#serialsButton").click(function(e){
		if(pressed==4){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=4;showNews('serials');$("body").css('background-color','rgba(255,255,0,0.08)');}
	});
	$("#serials_button_LSC").click(function(e) {
    	if(pressed==4){pressed=0;showNews('');$("body").css('background-color','rgba(255,255,255,1)');}
		else {pressed=4;showNews('serials');$("body").css('background-color','rgba(255,255,0,0.08)');}
	});
	$(document).on('change','#addImage',function(e){
		addImage(this);
	});
	/*$("#addPostAjax").submit(function(e){
		addPost(this);
		
	});*/
});

// function addPost(element){
// 	var formData = {
// 						'title':$("#addTitle").val(),
// 						'text':$("#addText").val(),
// 						'movies': $("#addCategories").find("#isMovies").val(),
// 						'cartoons':$("#addCategories").find("#isCartoons").val(),
// 						'anime':$("#addCategories").find("#isAnime").val(),
// 						'serials':$("#addCategories").find("#isSerials").val(),
// 					}
// 	$.post('addPostDb.php',{},function(data){
// 	},'json');
// }

// function addImage(element){
// 	$.post('actions/addImage.php',formData,function(data){
// 		alert('asd');	
// 	},'json');
// }

function rateNews(mark, element, newsID){
	var userID = $("#userID").val();
	$.post('actions/rate.php',{'userID': userID, 'newsID': newsID, 'mark': mark},function(data){
        data=JSON.parse(data);
		if(data.result==1){
			var rate = parseInt(element.parent().find('#rateSpan').html());
			element.parent().find('#rateSpan').html(data.rating);
			if(data.mark>0){
				element.parent().find(".post_rate").val("1");
				element.parent().find(".like_button").css("opacity",'1');
			}
			else if(data.mark<0){
				element.parent().find(".post_rate").val("-1");
				element.parent().find(".dislike_button").css("opacity",'1');
			}
			else {
				element.parent().find(".post_rate").val("0");
				element.parent().find(".like_button").css("opacity",'0.2');
				element.parent().find(".dislike_button").css("opacity",'0.2');
			}
		}
	});
	
}

function showNews(category){
	$.post('actions/news_row_update.php',{'category':category},function(data){
		$("#news").html(data);
	});
}
function deletePost(postID){
	$.post('actions/deletePost.php',{"newsID":postID},function(data){
		showNews('');
	});
}
function searchNews(element){
	var str = "";
	var c = $("#search_results");
	if($(element).val().length>0){
		$.post('search.php',{'search':$(element).val()},function(data){
            console.log(data);
			var c = $("#search_results");
			c.css('display','block');
			var data = (data.split("↓ "));
			var names = data[0];
			var ids = data[1];
			var arr = names.split("▬ ");
			var arr2 = ids.split("▬ ");
			for(var i=0; i<arr.length-1; i++) {
				str = str+"<li class='searchPostSelect'>"+arr[i].substr(0,50)+"<input type='hidden' class='searchId' value="+arr2[i]+"></li>";
			}
			c.find('ul').html(str);
		});
	}
	else c.find('ul').html(str);
	
}
function showPost(postID){
	$.post('actions/news_row_update_by_id.php',{'postID':postID},function(data){
		$("#news").html(data);
	});
}
