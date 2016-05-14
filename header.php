<div id='header_nav' class='header'>
		<table id='header_table'>
		<tbody>
			<tr>
				<td width='9.04%'><a href='news.php'><img id='logo' src='pictures/logo.png' height='75px' width='75px'></a></td>
				<td width='50.96%'><a href='news.php'><img id='title' src='pictures/title.png' height='75px'></a></td>
				<?php
                    
					if(!isset($_SESSION['authorised'])){?>
				<td width='25%'><div id='authorisation'>
								<p id='authorisation_text'>Authorisation:</p>
								<form id='authorisation' method='post' action='authorisation.php' accept-charset='UTF-8'> 
									<input type='text' name='login' required style='margin-bottom:5px'><br>
									<input type='password' required name='password'> 
									<input type='submit' value='Login'>
								</form>
							</div></td>
			<td width='15%'><div id='registration'><a href='Registration.php'><img src='pictures/register_button.png'  id='register_button'></a></div></td>
			<?php } else { ?>
				<td width='25%'>
						Welcome <?=$_SESSION['user']['name']?> <br> 
						<form id='authorisation' method='post' action='authorisation.php' accept-charset='UTF-8'>
							<input type='submit' value='LogOut'>
						</form>
					  </td>
					  <?php } ?>
		</tr>
		</tbody>
		</table>
		<table id='header_tabs'>
		<tbody>
			<tr>
				<td class='tabs'><a href='news.php'>News</a></td>
				<td class='tabs'><a href='home.php'>Home</a></td>
				<td class='tabs'><a href='stream.php'>Stream</a></td>
				<td class='tabs' style='width=5%' id='search'>
                	<a></a><input type='search' id='search_input' placeholder="|  search">
                	<div id='search_results'>
                    	<ul>
                        	
                         </ul>
                    <div>
                </td>
				<td class='tabs' style='width=20%' id='status_bar'>
		<?php 
				if(isset($_SESSION['authorised']))echo $_SESSION['user']['name'];
				else echo 'guest';
		?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php ?>