<?php
/*
Template Name: Teams template
Template Post Type: teams
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
			
		
	
		
		</div>
		
		
		<div class="rightCol">
			
			<table class="standard-box table table-striped table-hover" id="ongoing-events">
					
					<tbody>
			
						<tr>
						<th colspan="4" style="width:180px">Ongoing Events</th>
					
						<th colspan="4"<i class="fa fa-star"></i></th>
						</tr>
					
					
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
					
						<tr><td colspan="5" style="width:100%" >
						<div><a href="<?php echo get_permalink( $post_id );?>"><?php echo get_post_meta( $post->ID, 'event_name',true ); ?></a></div>
						
						<div class="end-text"><strong>Ends:</strong> <?php echo date( "l, jS F Y", strtotime( $enddate ) ); ?></div>
						</td>
					
						</tr>
						
					<?php }?>
						
					<?php $countb++; endwhile; else: ?>
					<tr><th colspan="5" style="width:100%" >No ongoing events.</th>
						
						</tr>
					<?php endif; wp_reset_postdata();?>
					
				
					</tbody>
					
					</table>
					
					<div class="spacer"></div>
					
			<div class="widget-logo standard-box">
				<img src="http://www.uk-ctf.org/wp-content/uploads/2018/07/drag_logo2.png"></img>
			</div>
			
			<table class="standard-box table table-striped table-hover" id="team-placements">
					
					
					<tbody>
			
						<tr>
						<th colspan="4" style="width:180px">UK Team Rankings</th>
						
						</tr>
						
						<tr>
						<td colspan="4"><div class="end-text">February 2019</div></td>
						</tr>
						
						<tr>
						<td>1.</td><td colspan="2">nanocomp</td><td align="right">22.329</td>
						</tr>
						
						<tr>
						<td>2.</td><td colspan="2">WannaByte</td><td align="right">16.063</td>
						</tr>
						
						<tr>
						<td>3.</td><td colspan="2">the cr0wn</td><td align="right">11.563</td>
						</tr>
						
						<tr>
						<td>4.</td><td colspan="2">EmpireCTF</td><td align="right">10.502</td>
						</tr>
						
						<tr>
						<td>5.</td><td colspan="2">crayontheft</td><td align="right">10.102</td>
						</tr>
		
					
					</tbody>
			</table>
					
				
			<div class="spacer"></div>
			
			</div>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->


		

		

		
<?php get_footer(); ?>
