<?php
/*
Template Name: Organisations template
Template Post Type: organisations
*/

get_header(); ?>

<div class="bgPadding">

		<div class="widthControl">
	
			<div class="logoCon">
			
				<a href="/">
					<div class="uk-ctf-logo" id="logo"></div>
				</a>
				
				<div class="banner-mid">
					<div class="alert alert-info" role="alert">
					<b>UK-CTF</b> offers a portal for UK-based security Capture The Flag (CTF) competitions, news, and results. We are an active community through our regular social media and content created through articles, write-ups and videos. Make sure the follow us on <a href="https://twitter.com/uk_ctf">Twitter</a> <i class="fa fa-twitter"></i>so you can keep up-to-date with all the latest CTF news.
					</div>
				</div>
				
			</div>
	
		<div id="bgMain" class="colCon">
		
		<div class="contentCol">
			
		<h1 class="content-title"><?php echo get_post_meta($post->ID, 'organisation_name', true)?></h1>
		
		
		<div class="org-desc">
		<?php if( get_field('organisation_logo') ): ?>
			<img class="org" height="200" align="right" style=inline:block;  src="<?php the_field('organisation_logo'); ?>" />
		<?php endif; ?>
		
		<p><b>Organisation link: </b><span class="inline-word-wrap"> <a href="<?php echo get_post_meta($post->ID, 'organisation_link', true) ?>"><?php echo get_post_meta($post->ID, 'organisation_link', true)?></a></span></p>
		<p><b>Description: </b><?php echo get_post_meta($post->ID, 'organisation_desc', true)?></p>
		</div>
		
		<div>
		
		<h1><strong>Events hosted</strong></h1>
		
		<?php $orgname = get_post_meta($post->ID, 'organisation_name', true) ?>
		
		<table class="table table-striped table-hover standard-box" id="org-events">
						
					
					<tbody>
					
					<tr><th colspan="2" style="width:20%">Event</th>
						<th style="width:60%">Date</th>
						
						</tr>
					
					
					<?php $args = array(
							'post_type' => 'events',
							//'posts_per_page' => '5',
							'post_status'  =>  'publish',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'meta_query' => array(
							'relation'  =>   'AND',
									array(
									'key' => 'event_organizer',
									'value' => $orgname, //value of "order-date" custom field
									'compare' => 'LIKE', //show events greater than or equal to today
									
									)
							)
					);
					//$the_query = new WP_Query( $args ); ?>
					
					<?php query_posts($args); ?>
					
					<?php $search = get_post_meta($post->ID, 'organisation_name' ,true);?>
					
					
					<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
					
					
					
					<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
					<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
				
							<?php if ( get_post_meta( $post->ID, 'event_organizer', true ) == $search) { ?>		
							
									<tr><td colspan="2"><a href="<?php echo get_permalink( $post_id );?>"><?php echo get_post_meta($post->ID,'event_name', true) ?></a></td>
								<td><?php echo date( "l, jS F Y,", strtotime( $date ) ); ?> <?php echo get_post_meta($post->ID, 'start_time', true); ?> – <?php echo date( "l, jS F Y,", strtotime( $enddate ) ); ?> <?php echo get_post_meta($post->ID, 'end_time', true); ?> <?php echo get_post_meta($post->ID, 'timezone', true); ?></td>
								
									
									<?php } ?> </p>
				
							
							<?php endwhile; else: ?>
					<tr><th colspan="5" style="width:100%" >No events found.</th>
						
						</tr>
					<?php endif;?>
					
			
					
					</tbody>
					
					
		</table>

		
		</div>
		
		
		
		
		
		</div>
		
		<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->


		

		

		
<?php get_footer(); ?>
