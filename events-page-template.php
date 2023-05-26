<?php
/*
Template Name: Events_page_template
Template Post Type: page
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
			
		<!-- Upcoming Events -->
				<?php  $countb = 0;		
					$today = date('Ymd'); //define "today" format; note timezone offset of -6 hours

					$args = array(
							'post_type' => 'events',
							
							'post_status'  =>  'publish',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
							'order' => 'ASC',
							'meta_query' => array(
							'relation'  =>   'AND',
									array(
									'key' => 'start_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '>=', //show events greater than or equal to today
									'type' => 'NUMERIC'
									)
							)
					);
					
					$the_query = new WP_Query( $args );
					
					if ( $the_query->have_posts()) : while ( $the_query->have_posts() && $countb<5 ) : $the_query->the_post(); { ?>
						
					<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
					<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
				
				<h1><b><a href="/events/">Upcoming Events</a> <a href="/feed/?post_type=events"><i class="fa fa-rss"></i></a></b></h1>
				
				<a href="<?php echo get_permalink( $post_id );?>" class="small-event standard-box">
				<div class="event-logo-container" style="font-size: 0.9rem; padding-top:4px;"><i class="far fa-calendar fa-3x"></i></div>
				<div class="table-holder">
				<table class="small-event-tab table-borderless">
				
				<tbody>
				
				<tr class="event-info">
				
					<td class="col-value event-col"><?php echo get_post_meta( $post->ID, 'event_name',true ); ?>
					</td>
					
					<td class="col-value medium-col"><?php echo get_post_meta($post->ID, 'format', true); ?></td>
					</td>
					<td class="col-value small-col"><?php echo get_post_meta($post->ID, 'prize', true); ?></td>
					</td>
					<td class="col-value small-col"><?php echo get_post_meta($post->ID, 'event_type', true); ?></a>
					</td>
				</tr>
				
				
				<tr class="event-details">
					<td class="col-desc"><?php echo get_post_meta($post->ID, 'location', true); ?> | <?php echo date( "j M Y", strtotime( $date ) ); ?> – <?php echo date( "j M Y", strtotime( $enddate ) ); ?>
					</td>
					<td class="col-desc">Format
					</td>
					<td class="col-desc">Prize
					</td>
				
				</tr>
	
				</tbody>
				
				</table>
				
				</div>
				</a>
				
					<?php }?>
						
					
					<?php $countb++;  endwhile; else: ?>
					
					<?php endif; wp_reset_postdata();?>
					
					<div class="spacer"></div>
					
				
				<!-- Ongoing Events -->	
						<?php  $countb = 0;		
					$today = date('Ymd'); //define "today" format; note timezone offset of -6 hours

					$args = array(
							'post_type' => 'events',
							'post_status'  =>  'publish',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
						
							'meta_query' => array(
							
									array(
									'key' => 'end_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '>=', //show events greater than or equal to today
									'type' => 'NUMERIC' ), array(
									'key' => 'start_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '<', //show events greater than or equal to today
									'type' => 'NUMERIC'
									)
									
									)
							
					);
					
					$the_query = new WP_Query( $args );
					
					if ( $the_query->have_posts()) : while ( $the_query->have_posts() && $countb<5 ) : $the_query->the_post(); { ?>
						
					<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
					<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
				
				<h1><b><a>Ongoing Events</a></b></h1>
				
				<a href="<?php echo get_permalink( $post_id );?>" class="small-event standard-box">
				<div class="event-logo-container" style="font-size: 0.9rem; padding-top:4px;"><i class="far fa-calendar fa-3x"></i></div>
				<div class="table-holder">
				<table class="small-event-tab table-borderless">
				
				<tbody>
				
				<tr class="event-info">
				
					<td class="col-value event-col"><?php echo get_post_meta( $post->ID, 'event_name',true ); ?>
					</td>
					
					<td class="col-value medium-col"><?php echo get_post_meta($post->ID, 'format', true); ?></td>
					</td>
					<td class="col-value small-col"><?php echo get_post_meta($post->ID, 'prize', true); ?></td>
					</td>
					<td class="col-value small-col"><?php echo get_post_meta($post->ID, 'event_type', true); ?></a>
					</td>
				</tr>
				
				
				<tr class="event-details">
					<td class="col-desc"><?php echo get_post_meta($post->ID, 'location', true); ?> | <?php echo date( "j M Y", strtotime( $date ) ); ?> – <?php echo date( "j M Y", strtotime( $enddate ) ); ?>
					</td>
					<td class="col-desc">Format
					</td>
					<td class="col-desc">Prize
					</td>
					
				</tr>
	
				</tbody>
				
				</table>
				
				</div>
				</a>
				
					<?php }?>
						
					
					<?php $countb++;  endwhile; else: ?>
					
					<?php endif; wp_reset_postdata();?>
					
					<div class="spacer"></div>
						
		
		
		<h1><b><a href="/events">Past Events</a> </b></h1>
		
		<?php  $countb = 0;		
					$today = date('Ymd'); //define "today" format; note timezone offset of -6 hours

					$args = array(
							'post_type' => 'events',
	
							'post_status'  =>  'publish',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'meta_query' => array(
							
									array(
									'key' => 'end_date',
									'value' => $today, //value of "order-date" custom field
									'compare' => '<', //show events less to today
									'type' => 'NUMERIC'
									)
							)
					);
					
					$the_query = new WP_Query( $args );
					
					if ( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); { ?>
						
					<?php $date = get_post_meta( $post->ID, 'start_date', true ); ?>
					<?php $enddate = get_post_meta( $post->ID, 'end_date', true ); ?>
				
				<a href="<?php echo get_permalink( $post_id );?>" class="small-event standard-box">
				<div class="event-logo-container" style="font-size: 0.9rem; padding-top:4px;"><i class="far fa-calendar fa-3x"></i></div>
				<div class="table-holder">
				<table class="small-event-tab table-borderless">
				
				<tbody>
				
				<tr class="event-info">
				
					<td class="col-value event-col"><?php echo get_post_meta( $post->ID, 'event_name',true ); ?>
					</td>
					
					<td class="col-value medium-col"><?php echo get_post_meta($post->ID, 'format', true); ?></td>
					</td>
					<td class="col-value small-col"><?php echo get_post_meta($post->ID, 'prize', true); ?></td>
					</td>
					<td class="col-value small-col" style="font-size: 12px;"><?php echo get_post_meta($post->ID, 'event_type', true); ?></a>
					</td>
				</tr>
				
				
				<tr class="event-details">
					<td class="col-desc"><?php echo get_post_meta($post->ID, 'location', true); ?> | <?php echo date( "j M Y", strtotime( $date ) ); ?> – <?php echo date( "j M Y", strtotime( $enddate ) ); ?>
					</td>
					<td class="col-desc">Format
					</td>
					<td class="col-desc">Prize
					</td>
					
				</tr>
	
				</tbody>
				
				</table>
				
				</div>
				</a>
				
					<?php }?>
						
					
					<?php $countb++;  endwhile; else: ?>
					<tr><th colspan="5" style="width:100%" >No past events.</th>
						
						</tr>
					<?php endif; wp_reset_postdata();?>
				
					<div class="spacer"></div>
	
				
				
			
		</div>
		
		<?php get_sidebar('right-col'); ?>
			
		</div>
			
		</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	

		
	
<?php get_footer(); ?>


