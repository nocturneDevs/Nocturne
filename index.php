<?php
// The Header for our theme.
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<!-- Main stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
<!-- Scalable Vector Icons from Font Awesome -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Mako:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:300' rel='stylesheet' type='text/css'>

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. -->
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body>
	<div id="page">

		<div id="nocturneWrapper">
			<h1><a href="<?php echo home_url(); ?>">nocturne</a></h1>
			<h3>Coffee, Cola, Code</h3>
			<p class="largeContent"> These two best buddies from IIT Madras have worked 
				together on their varied interests for over 4 years 
				now - music, theatre and of course, code. Both Engineering 
				Physics graduates with a passion for the arts, they 
				were drawn to front end design - the perfect fusion 
				of creativity and analytical skill. Welcome to Nocturne.
			</p>
		</div>

		
		<div class="bioColumn" id="bioColumnLeft">
			<h2>Sanjay Guruprasad</h2>
			<p class="iconwrapper">
				<a href="https://twitter.com/sanjaypojo" target="_blank"><i class="icon-twitter icon-3x"></i></a>
				<a href="mailto:sanjay@nocturnedevs.com" target="_blank"><i class="icon-envelope icon-3x"></i></a>
				<a href="http://thoughtarium.com" target="_blank"><i class="icon-globe icon-3x"></i></a>
			</p>
			<div class="imgWrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/resources/images/sgpic.jpg" class="biopic"></img>
			</div>

			<p class="content">
				Sanjay comes from a family of coders. His parents
				started up in the late 80s - their company Softrade 
				has now been building bullet-proof code for over 
				25 years. Having done his undergraduate thesis in 
				Natural Language Processing (Python/SQL) and then 
				working at an iBank where he automated various systems, 
				code runs in his blood. He is very into minimalist 
				design, iOS and the web.
			</p>

		</div>
		<div class="bioColumn" id="bioColumnRight">
			<h2>Hari Mohanraj</h2>
			<p class="iconwrapper">
				<a href="https://twitter.com/hari_mohanraj" target="_blank"><i class="icon-twitter icon-3x"></i></a>
				<a href="mailto:hari@nocturnedevs.com" target="_blank"><i class="icon-envelope icon-3x"></i></a>
				<a href="http://www.youtube.com/user/skfreak914" target="_blank"><i class="icon-youtube icon-3x"></i></a>
			</p>
			<div class="imgWrapper">
				<img width="100%" height="100%" src="<?php echo get_template_directory_uri(); ?>/resources/images/hmpic.jpg" class="biopic"></img>
			</div>
			
			<p class="content">
				Hari is currently pursuing his Masters degree in 
				Music Technology at New York University. His 
				engineering background, in tandem with his current 
				work in music technology, gives him a comprehensive 
				knowledge of digital signal processing, spatial audio, 
				and coding. He has worked on several projects involving 
				web audio, web design, 3-D audio, and auditory displays. 
				He is an avid musician, and of course, he also loves 
				video games.
			</p>
		</div>

		<div id="workWrapper">
			<h3>
				Portfolio
			</h3>

		<?php 
			$args = array( 
							'post_type' => 'project', 
							'posts_per_page' => 10,


						);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();

			// $custompost = get_post_custom(get_the_ID());
		?>
			<a href="<?php the_permalink(); ?>">
				<div class="projectWrapper">
					<div class="projectImageWrapper"><?php the_post_thumbnail() ?></div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
				</div>
			</a>
			
		<?php	
			endwhile;
		?>

		</div>
	
<?php get_footer(); ?>