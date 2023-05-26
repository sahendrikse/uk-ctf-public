<?php
/*
Template Name: Organisations_page_template
Template Post Type: page
*/

get_header(); ?>



<div class="bgPadding">

		<div class="widthControl">
	
			<div class="logoCon">
			
				<a href="/">
					<div class="uk-ctf-logo" id="logo"></div>
				</a>
				
				<div class="banner-mid"><div class="alert alert-info" role="alert">
  <b>UK-CTF</b> offers a portal for UK-based security Capture The Flag (CTF) competitions, news, and results. We are an active community through our regular social media and content created through articles, write-ups and videos. Make sure the follow us on <a href="https://twitter.com/uk_ctf">Twitter</a> <i class="fa fa-twitter"></i>so you can keep up-to-date with all the latest CTF news.
</div></div>
			</div>
	
		<div id="bgMain" class="colCon">
		
		
		
	
			<div class="contentCol">
			
			<h1 class="content-title">UK Organisations <i class="fa fa-home"></i></h1>
	
			<?php $args = array('post_type'=>array('organisations'),
							'order' => 'ASC', );
			query_posts($args); ?>
			
			<div class="thumb-con">
			
			<ul class="thumbnails">
			
			<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
		
			<?php $orgname = get_post_meta($post->ID, 'organisation_name', true)?>
		
				<li class="span4 org-single "style="float:left;">
					<div class="thumbnail">
						<h1 style="text-align:center; border-bottom: 1px solid #e5e5e5; padding-bottom: 10px;"><a href="<?php echo get_permalink( $post_id );?>"><b><?php echo $orgname ?></b></a></h1>
							<div class="logo">
											<?php if( get_field('organisation_logo') ): ?>
											
									<img style=inline:block; height="120" src="<?php the_field('organisation_logo');  ?>"/>
									
							<?php endif; wp_reset_postdata();?>
							</div>
							
						
				
						
						<?php $args2 = array(
							'post_type' => 'events',
							'meta_key' => 'start_date',
							'orderby' => 'meta_value_num',
							'order' => 'ASC',
							'meta_query' => array(
							'relation'  =>   'AND',
									array(
									'key' => 'event_organizer',
									'value' => $orgname, //value of "order-date" custom field
									'compare' => 'LIKE', //show events greater than or equal to today
									
									)
							)
					);
					?>
					
					<?php $innerq = new WP_Query($args2); ?>
					
					
					
				<?php $count = 0; ?>
					<?php if ( $innerq->have_posts() ) : while ( $innerq->have_posts()) : $innerq->the_post(); ?>
					
								<?php if ($firstpost == 0) { 
								$link = get_permalink($post_ID);
								$eventname = get_post_meta($post->ID, 'event_name', true);
								
							}  ?>
					
					
							<?php $count++;  endwhile; else:
						
					endif;wp_reset_postdata();?>					
				
							
				
						
								
						<p><b>Total events:</b> <?php echo $count ?></p>
						
						
					
						<p><b>Latest event: </b><a href="<?php echo $link; ?>"><?php echo $eventname; ?></a></p>
						
						
						
					<?php $eventname = ""; ?>
						
					</div>
				</li>
				
				<?php endwhile; else: ?>
				<?php endif;wp_reset_postdata(); ?>
			
			
				
			</ul>
			
			</div> <!-- thumb-con /div -->
			
			
			
			</div>
		
			<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->

<?php get_footer(); ?>





