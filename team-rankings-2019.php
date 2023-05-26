<?php
/*
Template Name: Team_rankings_2019_template
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
				<li class="active"><a data-toggle="tab" href="/rankings/">2019</a></li>
				<li><a href="/rankings/jan">Jan</a></li>
				<li><a href="/rankings/feb">Feb</a></li>
				<li><a data-toggle="tab">Mar</a></li>
			</ul>
			
			<div class="tab-content">
				<div id="2019" class="tab-pane fade in active">
					<div class="spacer"></div>
					<div class="chart-container">
			<canvas id="2019-ranking-chart" width="800" height="800"></canvas>
			</div>
			</div>
			
			<script>
			
			new Chart(document.getElementById("2019-ranking-chart"), {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb'],
    datasets: [{ 
        data: [22.329, 36.530],
        label: "nanocomp",
        borderColor: "#800000",
        fill: false
      }, { 
        data: [29.983, 11.563],
        label: "the cr0wn",
        borderColor: "#9A6324",
        fill: false
      }, { 
        data: [0, 22.438],
        label: "AFiniteNumberOfMonkeys",
        borderColor: "#808000",
        fill: false
      }, { 
        data: [16.063 ,16.063],
        label: "WannaByte",
        borderColor: "#469990",
        fill: false
      }, { 
        data: [0, 13.669],
        label: "Chernobyl Prisoners",
        borderColor: "#000075",
        fill: false
      }, {
		data: [0, 10.945],
        label: "TU6PM",
        borderColor: "#000000",
        fill: false
	  } , {
		data: [10.102, 10.565],
        label: "crayontheft",
        borderColor: "#e6194B",
        fill: false
	  } , {
		data: [10.502, 10.502],
        label: "EmpireCTF",
        borderColor: "#f58231",
        fill: false 
	  } , {
		data: [0, 8.849],
        label: "CultOfTheDeadCarrot",
        borderColor: "#ffe119",
        fill: false 
	  } , {
		data: [2.623, 8.248],
        label: "MGH",
        borderColor: "#bfef45",
        fill: false 
	  } , {
		data: [0, 8.103],
        label: "FreedomSecurity",
        borderColor: "#3cb44b",
        fill: false 
	  } , {
		data: [8.055, 8.053],
        label: "LogicalGeezers",
        borderColor: "#42d4f4",
        fill: false 
	  } , {
		data: [8.055, 8.053],
        label: "LogicalGeezers",
        borderColor: "#42d4f4",
        fill: false 
	  } , {
		data: [0, 4.831],
        label: "save the river",
        borderColor: "#4363d8",
        fill: false 
	  } , {
		data: [0, 3.927],
        label: "CodeheadUK",
        borderColor: "#911eb4",
        fill: false 
	  } , {
		data: [0, 2.803],
        label: "b4n5 CTF",
        borderColor: "#f032e6",
        fill: false 
	  } , {
		data: [0, 2.086],
        label: "RevEng",
        borderColor: "#a9a9a9",
        fill: false 
	  }
    ]
  },
  options: {
	responsive:true,
    title: {
      display: true,
	  fontSize: 14,
	  fontFamily: "'Open Sans', 'Open Sans', sans-serif",
      text: '2019 UK Rankings'
    }
	
  }
});
			
			</script>
					
				
			</div>
			
		
			
			
			
		

	
		
		</div> <!-- contentCol -->
	
	
	
		<?php get_sidebar('right-col'); ?>
			
			
			
			</div> <!-- colCon -->
		
		</div> <!-- widthControl -->
	
	</div> <!-- bgPadding -->	
		
<div> <!-- Footer div -->
	
<?php get_footer(); ?>


