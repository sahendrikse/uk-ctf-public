<?php
/*
Template Name: contents_page_template
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
			
		<h1><b><a>All Content</a> <a><i class="fa fa-rss"></i></a></b></h1>
								
				<table class="table table-striped table-hover standard-box" id="all-content">
				
				
				<tbody>
					
						<tr><th colspan="2" style="width:35%">Event</th>
						<th style="width:35%">Task/Title</th>
						<th style ="width:10"><a data-toggle="tooltip" title="Site content will be in the form of write-ups, articles and videos.
						">Type <i class="fa fa-info-circle"></i></a></th>
						
						<th style="width:10%">Link</th>
						</tr>
						
				<?php $args = array('post_type'=>array('content'));
					query_posts($args); ?>
				
				<?php  $count = 0;
					if ( have_posts() ) : while ( have_posts() && $count<10 ) : the_post(); ?>
				
					<tr>
						
						<?php $eid = get_post_meta($post->ID, 'event_id', true); ?>
								
						<td colspan="2" style="width:25%"><a href="/events/<?php echo $eid;"/" ?>"><?php echo get_post_meta($eid, 'event_name', true); ?></a></td>
						
						<td  style="width:45%"><?php echo get_post_meta($post->ID, 'task-title', true); ?></td>
						<td  style="width:20%"><?php echo get_post_meta($post->ID, 'type', true); ?></td>
						<td  style="width:10%"><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" <i class="fa fa-external-link"></a></td>
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


