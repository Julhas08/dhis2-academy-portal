<?php 
/*
**Template Name:contact Template
**
*/
	get_header();
?>
<div class="container">
	<h3 class="title-header container page-title">
        <span class="line-title"><?php the_title(); ?> </span>
        <span class="line"></span>
    </h3>
	<form class="from-control">
		<div class="form-group">
			<input type="text" class="form-control" id="NameEmail" placeholder="Name">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="email" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="Website" placeholder="Website">
		</div>
		<div class="textarea">
			<textarea placeholder="Comment Here" class="form-control"> </textarea>
		</div>
		
		<button type="submit" class="btn btn-default submit-button">Submit</button>
	</form>
</div>
<?php
	get_footer();
?>