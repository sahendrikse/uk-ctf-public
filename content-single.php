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
			
				<div>
				<h1 class="headline"><strong><?php the_title(); ?></strong></h1>
	
				<div class="article-info">
		
	
	
				<div class="author"><i class="fa fa-twitter"></i><a href="https://twitter.com/uk_ctf"><?php the_author(); ?></a></p>
				</div>
				<div class="date"><?php the_date(); ?> – <?php the_time();  ?></div>
				</div>
	
				<div style="margin: 0 0 10px;">
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				} ?>
				</div>
	
	
				<?php the_content(); ?>
			
				</div> <!-- Article content /div-->
			
			</div>
		
			<?php get_sidebar('right-col'); ?>
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->