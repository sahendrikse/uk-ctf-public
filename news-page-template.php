<?php
/*
Template Name: News_page_template
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
			
		<h1><b><a>All News</a> <a><i class="fa fa-rss"></i></a></b></h1>

		<?php $args = array('post_type'=>array('post'));
		query_posts($args); ?>
				
        <div class="standard-box standard-list">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
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
	
	
				
				
			
		</div>
		
		<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->
	
<?php get_footer(); ?>


