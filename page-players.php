<?php
/*
Template Name: Player template
Template Post Type: players
*/

get_header(); ?>

<div class="row">

	
		<div class="col-sm-6 blog-main; width: 50%">
		
		<h1 class="content-title"><?php echo get_post_meta($post->ID, 'player_name', true)?></h1>









		
		</div>

<?php get_footer(); ?>

</div>
	
	
	

