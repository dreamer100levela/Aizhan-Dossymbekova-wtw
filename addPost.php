<div id='blackback'>
</div>
<div id='newPost'>
	<form action='addPostDb.php' method="POST"  id='addPostAjax' enctype='multipart/form-data'>
		<p3>Add New Post<p3><br>
        <table><tbody>
		<tr><td colspan='2'><input type='text' placeholder='|  Title' name='title' id='addTitle' maxlength='80' required /></td>
    	    <td><div id='countDescTitle'>+80</div></td></tr></tbody></table>

		<br><br>
        <span style="font-family: 'Gill Sans Std Light Shadowed', 'Gill Sans Pro Light Shadowed', 'Gill Sans Pro Shadowed', Gill Sans Pro Cyrrilic Light, Helvetica, sans-serif; color:rgb(153,153,153); font-size:10px;"> Order categories by priority</span>
		<div id='addCategories'>
   <span id='addCategoriesMovies'><input type='hidden' value='0' name='m'><input type='hidden' name='movies' value='0' id='isMovies'>movies</span>
   <span id='addCategoriesCartoons'><input type='hidden' value='1' name='c'><input type='hidden' name='cartoons' value='0' id='isCartoons'>cartoons</span>
   <span id='addCategoriesAnime'><input type='hidden' value='2' name='a'><input type='hidden' name='anime' value='0' id='isAnime'>anime</span>
   <span id='addCategoriesSerials'><input type='hidden' value='3' name='s'><input type='hidden' name='serials' value='0' id='isSerials'>serials</span>
        </div>
        <br><br>
        <table><tbody>
        <!--<placeholder=note in the space-->
    	<tr><td><textarea placeholder='|  Text' name='text' id='addText' maxlength='1000'></textarea></td>
    		<td><div id='countDescText'>+1000</div><br><br></td></tr></tbody></table>
		<table><tbody>
        <tr><td>
        	<!--<form action='actions/addImage.php' method='post'>-->
        		<input type='file' name='image' id='addImage'><input type='hidden' name='imageName' id='imageName' value=''></td>
        	<!--</form>-->
            <td></td></tr>
        </tbody></table>
        <br>
        <span id='errormsg'></span>
        <br><br>
        <input type='submit' value='Add POST' id='addPost'>
	</form>
</div>
