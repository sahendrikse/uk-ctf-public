<?php
/*
Template Name: clear_page_template
Template Post Type: page, contents
*/



get_header(); ?>
<div class="row">
<div class="col-sm-6 blog-main; width: 50%">

<h1 class="content-title"><?php single_post_title(); ?></h1>


	

	
		
			<?php the_content(); ?>
	
				
				
						
		</div>	<!-- /.blog-main -->
		
		
		<div style="col-sm-6 blog-main; inline:block; float: left; width: 50%">
		
			
			
	
		</div>
	</div> 	<!-- /.row -->
<div class="row">
	
<?php get_footer(); ?>


