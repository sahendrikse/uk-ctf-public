<?php
/*
Template Name: Team_rankings_jan_template
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
			
					<ul class="nav nav-pills">
				<li><a href="/rankings/">2019</a></li>
				<li class="active"><a data-toggle="tab" href="/rankings/jan">Jan</a></li>
				<li><a href="/rankings/feb">Feb</a></li>
				<li><a data-toggle="tab">Mar</a></li>
			</ul>
			
			<div class="tab-content">
				<div id="jan" class="tab-pane fade in active">
					<div class="spacer"></div>
				</div>
				
			<table class="table table-striped standard-box table-hover rightTable">
			<tbody>
			
			<tr>
				<th>Ranking</th>
				<th>Team</th>
				<td colspan="2"; align="right"><strong>Rating</strong></td>
			</tr>
			
		
			
			<?php
			
			$file = "http://www.uk-ctf.org/uk_team_rankings_jan_2019";
			
			$json = file_get_contents($file);
			$json_decoded = json_decode($json);
			
			
			
			$val = 0;
			
			foreach($json_decoded as $result){
				$val++; 
			echo '<tr>';
            echo '<td>'.$val;
			echo '.';
			echo '</td>';
            echo '<td colspan="2">'.$result->Name.'</td>';
            echo '<td align="right">'.$result->Points.'</td>';
			echo '</tr>';
			
				
			}
			//echo '</tbody>'
			echo '</table>';
			?>
		
		</div>
		
	</div> <!-- contentCol -->
	
		<?php get_sidebar('right-col'); ?>
			
			
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->
	
<?php get_footer(); ?>


