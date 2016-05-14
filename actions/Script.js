
var searchvisible = true;
var scrolled = false;
$(window).on('scroll touchmove', function () {
    $('#header_table').toggle(!($(document).scrollTop() > 500));
	$('#header_nav').toggleClass('scrolled', $(document).scrollTop() > 500);
	$('.tabs').toggleClass('scrolled', $(document).scrollTop() > 500);
	$('.tabs a').toggleClass('scrolled', $(document).scrollTop() > 500);
	if($(document).scrollTop()>500){
		scrolled=true;
		$('#search_input').parent().find("a").html('Search');
		$('#search_input').hide();
		$('#status_bar').fadeTo(15,1,'swing',function(){
			$('#status_bar').show();
			searchvisible=false;
		});
		$('#search').css('width','5%');
		$('#LSCbody').show(20);
		$('#LSHome').css('top','40px');
		$('#addNews').css('top','40px');
		$("#newPost").css('top','100px');
	}else{
		scrolled=false;
		$('#search_input').parent().find("a").html('');
		$('#status_bar').hide(1,'linear',function(){
			$('#search_input').show();
			searchvisible=true;	
		});
		$('#search').css('width','25%');
		$('#LSCbody').hide();
		$('#LSHome').css('top','150px');
		$('#addNews').css('top','150px');
		$("#newPost").css('top','170px');
	}
});



$(document).ready(function(e) {
    $('#logo').hover(function(e) {
        this.src='pictures/logo-hover.gif';
    },function(e){
		this.src='pictures/logo.png';
	});
	$('#title').hover(function(e) {
        this.src='pictures/titlehover.png';
    },function(e){
		this.src='pictures/title.png';
	});
	$('#register_button').hover(function(e) {
        this.src='pictures/register_button_hover.png';
    },function(e){
		this.src='pictures/register_button.png';
	});
	$('#LSCtbody td').hover(function(e){
			$(this).css('opacity','1');
		},function(e){
			$(this).css('opacity','0.5');
	});
	$('#moviesButton').hover(function(e){
		this.src='pictures/hover-moviesButton.png';
		$('#News_main').css('background-image','url(pictures/moviesBckg.png)');
	}, function(e){
		this.src='pictures/moviesButton.png';
		$('#News_main').css('background-image','url(pictures/moviesBckg.png)');
	});
	$('#cartoonsButton').hover(function(e){
		this.src='pictures/hover-cartoonsButton.png';
		$('#News_main').css('background-image','url(pictures/cartoonsAnimated.gif)');
	}, function(e){
		this.src='pictures/cartoonsButton.png';
		$('#News_main').css('background-image','url(pictures/cartoonsBckg.png)');
	});
	$('#serialsButton').hover(function(e){
		this.src='pictures/hover-serialsButton.png';
		$('#News_main').css('background-image','url(pictures/serialsAnimated.gif)');
	}, function(e){
		this.src='pictures/serialsButton.png';
		$('#News_main').css('background-image','url(pictures/serialsBckg.png)');
	});
	$('#animeButton').hover(function(e){
		this.src='pictures/hover-animeButton.png';
		$('#News_main').css('background-image','url(pictures/animeAnimated.gif)');
	}, function(e){
		this.src='pictures/animeButton.png';
		$('#News_main').css('background-image','url(pictures/animeBckg.png)');
	});
	$("#addNews").hover(function(e){
		$('#addNews').css('opacity','0.4');
	},function(e){
		$('#addNews').css('opacity','0.1');
	});
	$('#addNews div').hover(function(e){
		$('#addNews').css('opacity','1');
		$('#addNewsText').css('opacity','1');
		$('#addNewsText').css('display','inline');
	},function(e){
		$('#addNews').css('opacity','0.4');
		$('#addNewsText').fadeOut(800);
	});
	$('#search a').click(function(e) {
        if(scrolled){
			if(searchvisible){
				$('#search_input').parent().find("a").html('Search');
				$('#search_input').hide();
				$('#search').css('width','5%');
				$('#status_bar').fadeTo(15,1,'swing',function(){
					$('#status_bar').show();
					searchvisible=false;
				});
			}else{
				$('#search_input').parent().find("a").html('');
				$('#status_bar').hide(1,'linear',function(){
					$('#search_input').show();
					$('#search').css('width','25%');
					searchvisible=true;	
				});
			}
		}
    });
	$(document).on('dblclick','#search_input',function(){
		if(scrolled){
			$('#search_input').parent().find("a").html('Search');
			$('#search_input').hide();
		}
	});
	$(document).on("keypress","#search_input",function(e){
		searchNews(this);
	});
	$(document).on('focusout','#search_input',function(e){
		$(this).parent().find('#search_results').fadeOut(1000);
	});
	$(document).on('click','.searchPostSelect',function(e){
		var postID = $(this).find(".searchId").val();
		showPost(postID);
	});
	$('#headButton').click(function(e) {
        $(document).scrollTop(-200);
    });
	$('#buttonPost').click(function(e){
		$("#newPost").css('display','block');
		$('#blackback').css('display','block');
	});
	$('#blackback').click(function(e){
		$("#newPost").css('display','none');
		$('#blackback').css('display','none');
		$('.confirmDelete').css('display','none');
	});
	$(document).on('click','#stopSearchMethod',function(e){
		showNews('');
	});
});
//post rate
$(document).ready(function(e) {
	var post_rate = document.getElementsByClassName('post_rate');
	for(var i=0; i<post_rate.length; i++){
		var v = post_rate.item(i);
		if(v.value>0) post_rate.item(i).parentNode.getElementsByClassName("like_button").item(0).style.opacity='1';
		else if(v.value<0) post_rate.item(i).parentNode.getElementsByClassName("dislike_button").item(0).style.opacity='1';
		else{
			post_rate.item(i).parentNode.getElementsByClassName("like_button").item(0).style.opacity='0.2';
			post_rate.item(i).parentNode.getElementsByClassName("dislike_button").item(0).style.opacity='0.2';
		}
	}
});

function checkLat(inp) {
    inp.value=inp.value.replace(/[^a-z]/gi,'');
}

//Registration
$(document).ready(function(e) {
    var login  = $('#login');
	var name = $('#name');
	var password = $('#password');
	var con_password = $('#con_password');
	var email = $('#email');
	login.focusout(function(e) {
		if(login.val().length<5) login.css('background-color','#FD9F9F');
		else login.css('background-color','#FFF');        
    });
});
$(document).on('mousemove',"body",function(e){
	changePostSize();
});
$(document).on("blur","#addText",function(e){
	$("#countDescText").html("+"+(1000-$(this).val().length));
});

$(document).on("keyup","#addText",function(e){
	$("#countDescText").html("+"+(1000-$(this).val().length));
});
$(document).on('blur',"#addTitle",function(e){
	$("#countDescTitle").html("+"+(80-$(this).val().length));
});
$(document).on('keyup',"#addTitle",function(e){
	$("#countDescTitle").html("+"+(80-$(this).val().length));
});


$(document).ready(function(e) { 
	$(document).on('click','#addCategories span',function(e) {
		var element = this.getElementsByTagName("input").item(1);
		var ind = this.getElementsByTagName("input").item(0).value;

		if($(element).val()==0){
			element.value=1;
			var c = document.getElementById("addCategories").getElementsByTagName("span");
			for(var i=0; i<c.length; i++){
				var elements = c.item(i).getElementsByTagName("input");
				if(elements.item(0).value<ind) elements.item(0).value++;
			}
			this.getElementsByTagName("input").item(0).value=0;
		}
		
		else{
			var c = document.getElementById("addCategories").getElementsByTagName("span");
			for(var i=0; i<c.length; i++){
				var elements = c.item(i).getElementsByTagName("input");
				if(elements.item(0).value>ind)elements.item(0).value--;
			}
			this.getElementsByTagName("input").item(0).value=3;
			element.value=0;
		}
		var c = document.getElementById("addCategories").getElementsByTagName("span");
		for(var i=0; i<c.length; i++){
			var c1 = c.item(i);
			var c2 = c.item(i).getElementsByTagName('input').item(0);
			$(c1).css("left",(80+(80*parseInt($(c2).val())))+"px");
			
			var c3 = c.item(i).getElementsByTagName('input').item(1);
			if(c3.value==1) $(c1).css("opacity","1");
			else $(c1).css("opacity","0.2");
		}
	});
	$(document).on('mouseover',".postHoverZone",function(e){
		$(this).find(".correctPost").find('table').css('display','block');
		$(this).find(".correctPost").find('table').css('opacity','1');
	});
	$(document).on('mouseleave',".postHoverZone", function(e){
		$(this).find('.correctPost').find('table').fadeOut(400);
	});
	$(document).on('mouseover',".correctPost td",function(e){
		$(this).css('opacity','1');
	});
	$(document).on('mouseleave',".correctPost td",function(e){
		$(this).css('opacity','0.5');
	});
	$(document).on('click',".closePost",function(e){
		$(this).parent().parent().parent().parent().parent().parent().parent().parent().hide(400);
	});
	$(document).on('click',".hidePost",function(e){
		var c = $(this).parent().parent().parent().parent().parent().parent().parent().parent();
		var postname = c.find(".post_title").html(); 
		c.find('.post_hidden').val(c.html());
		c.find('.post').html("<table class='hiddenPost' width='100%'><tr><td class='post_title'>"+postname+"</td></tr><table>");
		c.find("#miniHoverZone").html("<table><tr><td class='unhidePost'><img src='pictures/unhidePost.png' width='80%'></td></tr></table>");
		c.find("#miniHoverZone").css('height','30px');
		c.find("#miniHoverZone").find('table').css('height','30px');
	});
	$(document).on('click','.hiddenPost',function(e){
		var c = $(this).parent().parent().parent().parent().parent();
		c.html(c.find('.post_hidden').val());
		c.find("#miniHoverZone").css('height','150px');
		c.find("#miniHoverZone").find('table').css('height','80px');
		c.find('.post_hidden').val('');
		
	});
	
	$(document).on('click','.unhidePost',function(e){
		var c = $(this).parent().parent().parent().parent().parent().parent().parent().parent();
		c.html(c.find('.post_hidden').val());
		c.find("#miniHoverZone").css('height','150px');
		c.find("#miniHoverZone").find('table').css('height','80px');
		c.find('.post_hidden').val('');
	});
	
	$(document).on('click','.deletePost',function(e){
		$(this).parent().parent().parent().parent().find(".confirmDelete").css('display','block');
		$("#blackback").css('display','block');
	});
	$(document).on('click','.closedeletebar',function(e){
		$(this).parent().css('display','none');
		$("#blackback").css("display","none");
	});
	$(document).on('click','.delete',function(e){
		var postID=$(this).parent().parent().parent().find('#postID').html();
		$(this).parent().css('display','none');
		$("#blackback").css("display","none");
		deletePost(postID);
	});
	
});


function changePostSize(){
	var wT = $("#addText").width();
	var hT = $("#addText").height();
	$("#newPost").width(350-250+wT);
	$("#newPost").height(400-100+hT);
}

//End of code