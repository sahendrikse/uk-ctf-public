<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font APIS -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">

    <!-- Button & Icon APIS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script async defer src="https://buttons.github.io/buttons.js"></script>

	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>
	
    <?php wp_head();?>
</head>

<body>
    <div class="blog-masthead" id="nav">
		<!-- Nav bar -->
        <nav class="blog-nav">
            <ul>
                <div class="logoNav">
                <img id="logo-small" src="http://www.uk-ctf.org/wp-content/uploads/2019/02/logotest_web2.png"></img>
                </div>
				
                <li>
                    <a href="/news/">News</a>
                </li>
		        <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Events
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <a style="color:#000000;" href="/events/"> All events</i></a>
                    <a style="color:#000000;" href="/content/"> Write-ups</i></a>
					</ul>
				</li>  
                <li><a href="/rankings/">Teams</a></li>
                <li><a href="/organisations/">Organisations</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Contact
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <!-- <a style="color:#000000;" href="report-bug"> Report bug</i></a> -->
                    <a style="color:#000000;" href="contact">For event organisers</a>
                    <a style="color:#000000;" href="applications">For applications</a>
		            </ul>
		        </li>
				
	  	<ul class="blog-nav navbar-right">
	  		<!-- <li><span class="glyphicon glyphicon-user"></span>  Sign Up</li> -->
      		<!-- <li><span class="glyphicon glyphicon-log-in"></span>  Login</li> -->
		</ul>
		</ul>
	</nav>
</div>

<!-- Container -->
<div class="container">

		
		
			
		
