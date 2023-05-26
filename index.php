<?php get_header(); ?>

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
			
			<h1><b><a href="/news/">Latest News</a> <a href="/feed/?post_type=posts"><i class="fa fa-rss fa-xs"></i></a></b></h1>
			
				<div class="standard-box standard-list">
				
				<?php if ( have_posts() ) : while ( have_posts() && $count<5 ) : the_post(); ?>
				
					<a href="<?php echo get_permalink( $post_id );?>" class="newsline article">
					
					<i class="fas fa-newspaper newsicon"></i>
					
					<div class="newstc">
					<div class="newsrecent"><?php echo get_the_date( "j M Y", strtotime( $post_id ) ); ?></div>
					<div class="newsrecent"><?php echo get_the_time( $post_id ); ?></div>
					</div>
					
					<div class="newstext"><?php echo get_the_title( $post_id ); ?></div>
					<div><i class="fas fa-chevron-right"></i></div>
					</a>
					
				<?php $count++;  endwhile; else: ?>
				
				<div class="standard-box standard-list">
				<div class="newsline article">No news found.</div>
				</div>
				
				<?php endif; wp_reset_postdata();?>
				
				</div>
				
				<div class="spacer"></div>
				
				
				
				<!-- Upcoming Events -->
				<?php  $countb = 0;		
					$today = date('Ymd'); //define "today" format; note timezone offset of -6 hours

					$args = array(
							'post_type' => 'events',
							'posts_per_page' => '5',
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
				
				<h1><b><a href="/events/">Upcoming Events</a> <a href="/feed/?post_type=events"><i class="fa fa-rss fa-xs"></i></a></b></h1>
				
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
					<tr><th colspan="5" style="width:100%" >No upcoming events.</th>
						
						</tr>
					<?php endif; wp_reset_postdata();?>
				
				<div class="spacer"></div>
					
					<h1><b><a href="/contents/">Content and Write-ups</a> <a href="/feed/?post_type=contents"><i class="fa fa-rss fa-xs"></i></a></b></h1>
						
						
						
				<table class="standard-box table table-striped table-hover" id="content_table">
				
					<tbody>
					
						<tr><th colspan="2" style="width:35%">Event</th>
						<th style="width:35%">Task/Title</th>
						<th style ="width:10"><a data-toggle="tooltip" title="Site content will be in the form of write-ups, articles and videos.
						">Type <i class="fa fa-info-circle"></i></a></th>
						
						<th style="width:10%">Link</th>
						</tr>
					
					<?php  
					$args2 = array('post_type'=>array('content'));
					query_posts($args2);
					
					$args3 = array('post_type'=>array('events'));
							
					$countc = 0;
					$countd = 0;
						
					if ( have_posts() ) : while ( have_posts() && $countc<5 ) : the_post(); ?>
					<tr>
						
						<?php $eid = get_post_meta($post->ID, 'event_id', true); ?>
								
						<td colspan="2" style="width:25%"><a href="/events/<?php echo $eid;"/" ?>"><?php echo get_post_meta($eid, 'event_name', true); ?></a></td>
						
						<td  style="width:45%"><?php echo get_post_meta($post->ID, 'task-title', true); ?></td>
						<td  style="width:20%"><?php echo get_post_meta($post->ID, 'type', true); ?></td>
						<td  style="width:10%"><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>"> <i class="fa fa-external-link"></i></a></td>
						</tr>
						
					<?php $countc++; endwhile; else: ?>
					<tr><th colspan="5" style="width:100%" >No content found.</th>
						
						</tr>
					<?php endif; wp_reset_postdata();?>
						
					</tbody>
					
					</table>
				

			
			</div>
			
			<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->
	
	
	
<?php get_footer(); ?>
