<?php
/*
Template Name: Team_rankings_template
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
			
			<h1 class="content-title"><?php the_title(); ?></h1>
			
			<?php
			$file = "http://www.uk-ctf.org/uk_team_rankings_feb_2019";
			
			$json = file_get_contents($file);
			$json_decoded = json_decode($json);
			
			
			
			$val = 0;
			
			foreach($json_decoded as $result){
				
				$val++; 
			echo '<div class="ranked-team standard-box">';
			echo 	'<div class="bg-holder">';
			echo 		'<div class="ranking-header">';
			echo 			'<span class="position">'.$val;
			echo 			'.';
			echo 			'</span>';
			echo			'<div class="relative">';
			echo				'<div class="teamLine">';
			echo					'<span class="name">'.$result->Name;
			echo					'</span>';
			echo					'<span class="points">'.$result->Points;
			echo					'</span>';
			echo				'</div>';
			echo			'<div class="playersLine">';
			echo				'<div class="rankingNicknames">';
			echo					'<span></span>';
			echo				'</div>';
			echo			'</div>';
			echo		'</div>';
			echo	'</div>';
			echo	'</div>';
			echo	'</div>';
				
			} ?>
			
			
			<div class="ranked-team standard-box">
                <div class="bg-holder">
                    <div class="ranking-header">
					    <span class="position">1.</span>
						<div class="relative">
						    <div class="teamLine">
								<span class="name">Name</span>
								<span class="points">(2103 points)</span>
							</div>
							<div class="playersLine">
								<div class="rankingNicknames">
									<span>Name 1</span>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
			
			
			
			

		
		
	</div> <!-- contentCol -->
	
		<?php get_sidebar('right-col'); ?>
			
			
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->
	
<?php get_footer(); ?>


