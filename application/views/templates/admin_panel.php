<!--ADMIN PANEL WRAPER-->
<div id="admin_wrap">

<!-- IMAGE PLACEHOLDER -->
	<div class="image_holder">
		<img id="admin_logo" src="images/logo.png" alt="logo_hill"/>
            <ul>
                <li><label id="add_news_show">
                    Add new news:
                    <br/>
                    <img src="images/add.png" width="72px" height="52px"/>
                </label>
                </li>
               <li> <label id="send_newsletter_show">
                    Send newsletter:
                    <br/>
                <img id="news_letter_icon" src="images/newsletter.png" width="72px" height="52px"/>
                </label>
               </li>
                <li><label id="validate_comment_show">
                    Verify comments:
                    <br/>
                    <img src="images/comment.png" width="72px" height="52px"/>
                </label>
                </li>
                </li>
                <li><label id="upload">
                    Replace PDF's:
                    <br/>
                    <img src="images/upload.png" width="72px" height="52px"/>
                </label>
                </li>
                  <li><label id="logOut">
                    Log out:
                    <br/>
                    <img src="images/logout.png" width="72px" height="52px"/>
                </label>
                </li>
            </ul>
	</div>
<!-- IMAGE PLACEHOLDER END -->

<!-- TABLE FOR ADMINISTARTING NEWS START-->
<table id="news_data">
	<thead>
		<tr>
			<th>No.</th>
			<th>TITLE.</th>
			<th>TEXT(short)</th>
			<th>UPDATE</th>
			<th>DELETE</th>
		</tr>
	</thead>
	<tbody>
		<?php for ($i=0; $i < count($all_news); $i++) { ?>
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $all_news[$i]['Title'];?></td>
			<td><?php echo $all_news[$i]['Text'];?></td>
			<td id="<?php echo $all_news[$i]['newsID']; ?>" class="update"><img src="images/update.png"></td>
			<td id="<?php echo $all_news[$i]['newsID']; ?>" class="delete"><img src="images/delete.png"></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<!-- TABLE FOR ADMINISTARTING NEWS ENDS  -->

<!--FORM FOR ADDING NEWS START -->
	<form class="forms inactive" id="add_news_form">
		<fieldset>
			<legend>Add new news:</legend>
		<br/>
		    <input type="text" name="title" id="title" placeholder="News title"/>
		<br/>
		    <textarea row="5" name="news_text"></textarea>
		<br/>
		
            <?php for($i = 0; $i < count($category); $i++) { ?>
            <input type="checkbox" class="cat_id" id="<?php echo $category[$i]['id']?>"/><?php echo $category[$i]['CategoryName']?>
            <br/>
			<?php } ?>
		<br/>
		<input type="hidden" name="news_id" id="news_id" />
		<br/>
		<input type="button" name="add_news"    id="add_news" class="btn btn-primary" value="Add news"/>
		<input type="button" name="update_news" id="update_news" class="btn btn-primary hide" value="Update news"/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="reset_field" value="Reset" class="btn btn-danger reset"/>
		</fieldset>
	</form>
<!--FORM FOR ADDING NEWS END -->

<!--FORM FOR SENDING NEWSLETTER -->
<form class="forms inactive" id="newsletter_form">
	<textarea row="5" placeholder="Enter newsletter text"></textarea>
	<br/>
	<br/>
	<input type="button" id="send_newsletter" class="btn btn-primary" value="Send newsletter"/>
</form>
<!--FORM FOR SENDING NEWSLETTER END-->
<!--FILE UPLOAD START-->
    <form id="file_upload" class="inactive">
        <br/>
        <label>Blounge-speisekarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files1" data-url="ajax/pdf_upload_1" multiple>
            <label>Blounge-weinkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files2" data-url="ajax/pdf_upload_2" multiple>
            <label>Hill-silvestermenu.pdf:</label>
        <br/>
        <input class="fileupload" type="file" name="files3" data-url="ajax/pdf_upload_3" multiple>
	<br/>
        <label>Hill-speisekarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files4" data-url="ajax/pdf_upload_4" multiple>
            <br/>
            
        <label>Hill-spirituosenkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files5" data-url="ajax/pdf_upload_5" multiple>
            <br/>
        <label>Hill-spirituosenkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files6" data-url="ajax/pdf_upload_6" multiple>
            <br/>
        <label>Hill-valentinstag.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files7" data-url="ajax/pdf_upload_7" multiple>
            <br/>
            
        <label>Hill-weinkarte.pdf.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files8" data-url="ajax/pdf_upload_8" multiple>
            <br/>
            
            
            
        <label>Menagerie-weinkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files9" data-url="ajax/pdf_upload_9" multiple>
            <br/>
            
        <label>Menagerie-speisekarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files10" data-url="ajax/pdf_upload_10" multiple>
            <br/>
         <label>Menagerie-weinkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files11" data-url="ajax/pdf_upload_11" multiple>
            <br/>
            
            
            
            
            
            
        <label>Mumok-abendmenu.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files12" data-url="ajax/pdf_upload_12" multiple>
            
            
            <label>Mumok-mittagslunch.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files13" data-url="ajax/pdf_upload_13" multiple>
            <br/><label>Mumok-silvestermenu.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files14" data-url="ajax/pdf_upload_14" multiple>
            <br/><label>Mumok-speisekarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files15" data-url="ajax/pdf_upload_15" multiple>
            <br/><label>Mumok-weinkarte.pdf:</label>
        <br/>
            <input class="fileupload" type="file" name="files16" data-url="/jax/pdf_upload_16" multiple>
            <br/>
    </form>
	<form id="comment_review" class=" forms inactive">
	<table>
		<tr>

			<th>Email</th>
			<th>Message</th>
			<th>Accept</th>
			<th>Decline</th>
			<th>View full comment</th>
		</tr>
		<?php for ($i=0; $i <count($comments); $i++) { ?>
		<tr class="<?php echo $comments[$i]['commentID']?>">
			<td><?php echo $comments[$i]['guestEmail']?></td>
			<td><?php echo substr($comments[$i]['guestComment'], 0,20)."..."; ?></td>
			<td name="approve" class="approve " id="<?php echo $comments[$i]['commentID']?>"><img src="images/add_c.png" /></td>
			<td name="decline" class="decline" id=" <?php echo $comments[$i]['commentID']?>"><img src="images/remove.png" width="32px" height="32px"/></td>
			<td class="review" id="<?php echo $comments[$i]['commentID']?>" name="<?php echo $comments[$i]['guestComment']; ?>"><img src="images/review.png" width="32px" height="32px"/></td>

		</tr>
		<?php } ?>
	</table>
	<div id="read"></div>
</div>
</form>
<!--FILE UPLOAD END -->


<!-- ADMIN PANEL WRAPER END-->
<script>
$(function () {
    $('.fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
        	var obj = jQuery.parseJSON(data);
        	console.log(data.result);
        }
    });
});
</script>
