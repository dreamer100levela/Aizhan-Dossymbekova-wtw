<?php
session_start();
require ('db_connect.php');
$category="";
if(isset($_POST['postID']))$postID=$_POST['postID'];
$genres=array('movies','cartoons','anime','serials');
$query=mysql_query("SELECT * FROM `news` ORDER BY `date` DESC");
while ($row=mysql_fetch_array($query)){

	$show=false;
	$rowID=$row['id'];
	$categories = mysql_fetch_array(mysql_query("SELECT `movies`,`cartoons`,`anime`,`serials` FROM `newsCategory` WHERE `newsID`='$rowID'"));
	if(isset($categories["$category"]))
        if($categories[$category]>0)
            $show=true;
	if($rowID==$postID){
	?>
    	<div id="stopSearchMethod"> <img src="pictures/closePost.png" width="15px"> </div>
    	<table class='postHoverZone'>
        <input type="hidden" class='post_hidden' value=''>
        
        <tbody>
        <tr>
        <td>
		<div class='post' id='post_<?=$row['id']?>'>
        	
			<input type='hidden' class='post_category' value='<?=$row['category']?>'>
			<input type='hidden' class='post_id' value='<?=$row['id']?>'>
            <table width='100%' class='news_table_<?=$row['category']?>'>
            </tbody>
                <tr>
                	<td colspan='4' width='80%' class='post_title'><?=$row['title']?></td>
					<td colspan='2' width='20%' class='post_category_<?=$row['category']?>'><b><?php ;
					
						for($s=0;$s<4;$s++)if($categories[$s]==1) echo $genres[$s]."<br>";
						for($s=0;$s<4;$s++)if($categories[$s]==2) echo $genres[$s]."<br>";
						for($s=0;$s<4;$s++)if($categories[$s]==3) echo $genres[$s]."<br>";
						for($s=0;$s<4;$s++)if($categories[$s]==4) echo $genres[$s]."<br>";
					?></b></td>
</tr>
                <tr>
                	<td colspan='6' class='post_text'><?=$row['text']?></td>
                </tr><?php ;
                if(!($row['photo']=="")){
					?>  <tr>
                		<td colspan='6' class='post_image'><img src='news/img/<?=$row['photo']?>' width='70%' ></td>
               			 </tr>
					<?php }
                if(isset($_SESSION['authorised'])){
                    echo "<tr class='news_down_row'>
                	<td class='author' width='25%'>";
					$authorId=$row['author'];
					$roww = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE id=$authorId"));
					echo $roww['name']; ?>
					</td>
					<input type='hidden' id='newsID' value="<?=$row['id']?>">
                    <td class='date' width='25%'>"<?=$row['date']?>"</td>
                    <td class='comments_button' width='20%'>Comment</td>
                    <td id='post_rating'>Rating: <span id='rateSpan'><?=($row['like']-$row['dislike'])?></span></td>
					<input class='post_rate' type='hidden' value="<?php		
					$newsID=$row['id'];
					$userID=$_SESSION['id'];
					$r=mysql_fetch_array(mysql_query("SELECT * FROM `rateNews` WHERE `newsID`=$newsID AND `userID`=$userID"));
					if($r['rate']>0) echo "1";
					else if($r['rate']<0) echo '-1';
					else echo '0';?>
                    ">
                    <td class='dislike_button' id='dislike_button_<?=$row['id']?>' width='5%'></td>
                    <td class='like_button' id='like_button_<?=$row['id']?>' width='5%'></td>
                </tr><?php }
                else{
                    ?><tr class='news_down_row'>
                    <td class='author'><?php
                    $authorId=$row['author'];
                    $row2 = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE id=$authorId"));
                    echo $row2['name']; ?>
                    </td>
                    <td class='date'><?=$row['date']?></td>
                    <td class='Comments_button'>Comment</td>
                    <td>Rating: <?=($row['like']-$row['dislike'])?></td><td></td><td></td>
                </tr><?php
                } ?>
			</tbody>
            </table>
		</div>
        </td>
        <?php if(isset($_SESSION['authorised'])){?>
        <td class='correctPost'>
        	<div id='miniHoverZone'>
			<?php if($_SESSION['id']==$row['author']) {?>
            	<table>
                	<tr><td class='hidePost'><img src="pictures/hidePost.png" width="80%"></td></tr>
                    <tr><td class='editPost'><img src="pictures/editPost.png" width="80%"></td></tr>
                    <tr><td class='deletePost'><img src="pictures/deletePost.png" width="80%"></td></tr>
                    <div class='confirmDelete'>
                    	<span>Are you sure want to delete post <?php if(strlen($row['title'])>25) echo substr($row['title'],0,30)."...";
															else echo $row['title']; ?></span>
                                                            <br><br><span id='postID' style="color:rgba(255,255,255,0)"><?=$row['id']?></span>
                    	<input type="submit" class='delete' value='DELETE'><input type='submit' class='closedeletebar' value="CANCEL">
                        <input type="hidden" class='postID' val="<?=$row['id']?>">
                    </div>
                    <input type="hidden" class="tempData" val="">
                </table>
            <?php } else {?>
            	<table>
                	<tr><td class='hidePost'><img src="pictures/hidePost.png" width="80%"></td></tr>
                    <tr><td class='closePost'><img src="pictures/closePost.png" width="80%"></td></tr>
                    <tr><td></td></tr>
                </table>
           	
			<?php } ?>
		</div>		
        </td>
        <?php }?>
        </tr>
        </tbody>
        </table>
		<?php
	}
}
?>