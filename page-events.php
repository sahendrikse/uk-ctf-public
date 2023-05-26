<?php
/*
Template Name: Events template
Template Post Type: events
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
		
		<div class="event-title">
		<h1 class="content-title"><?php echo get_post_meta($post->ID, 'event_name', true)?></h1>
		</div>
		
		<?php $event_id = get_the_ID();
			  $event_date = get_post_meta( $post->ID, 'end_date', true );
		?>
		
	
		
		<?php
		
		
		
		$args = array(
			'post_type'		=> 'results',
			'meta_key'		=> 'event_id',
			'meta_value'	=> $event_id,
			'compare' => '='
		);	
					
		$the_query = new WP_Query( $args );
		
		if ( $the_query->have_posts() && $event_date>$date ) : while ( $the_query->have_posts() ) : $the_query->the_post(); { ?>
						
		<div class="alert alert-warning" role="alert">
		<p>This event has now ended and is currently archived. Click <a href="<?php echo get_permalink($post_id ); ?>">here</a> to see the published results of the competition.</p>
		</div>
						
		<?php }?>
					
		<?php endwhile; else: ?>
		
		<?php endif; wp_reset_postdata();?>
		
		<?php if ( get_post_meta( $post->ID, 'event_type', true ) == 'Qualifier' ) { ?>
		<div class="alert alert-warning" role="alert">
		<p>This is a satellite event to <a href="/events/<?php echo get_post_meta( $post->ID, 'satellite', true ); ?>">[event]</a>.</p>
		</div>
		<?php } ?> </p>
		
			<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
			<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
			
	<p><b>Event Organiser: </b><?php echo get_post_meta($post->ID, 'event_organizer', true); ?></p>
	<p><b>Type: </b><?php echo get_post_meta($post->ID, 'event_type', true); ?></p>
    <p><b>Description: </b><?php echo get_post_meta($post->ID, 'event_desc', true); ?></p>
	<p><b>Format: </b><?php echo get_post_meta($post->ID, 'format', true); ?></p>
	<p><b>Start: </b><?php echo date( "j M Y", strtotime( $date ) ); ?> @ <?php echo get_post_meta($post->ID, 'start_time', true); ?>
			<?php echo get_post_meta($post->ID, 'timezone', true); ?></p>
	<p><b>End: </b><?php echo date( "j M Y", strtotime( $enddate ) ); ?> @ <?php echo get_post_meta($post->ID, 'end_time', true); ?>
			<?php echo get_post_meta($post->ID, 'timezone', true); ?></p>
	<p><b>Location: </b><?php echo get_post_meta($post->ID, 'location', true); ?>
	
	<?php if ( get_post_meta( $post->ID, 'location', true ) == 'Offline' ) { 
	?> – <?php echo get_post_meta($post->ID, 'offline_location', true);
	}?> </p>
	
	<p><b>Prize(s): </b><?php echo get_post_meta($post->ID, 'prize', true); ?></p>
		

	<p class="last-buffer"><b>Link: </b><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"> <i class="fa fa-external-link"></i></a></p>
	

		
	
					
		</div>
		
		
		<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->


		

		

		
<?php get_footer(); ?>
