$(document).ready(function(){
		$("#registerButton").click(function(){
			var login = $("#loginbox").val();
			var email = $("#email").val();
			var pass1 = $("#pass1").val();
			var pass2 = $("#pass2").val();
			if (login == '' || email == '' || pass1 == '' || pass2 == '') {
				alert("Please fill all fields!!!!!!");}
			else if(pass1.length<8){
				alert("Password must have at least 8 symbols")}
			else if(pass2!=pass1){
				alert("Confirm password must be same!")}
		});
});