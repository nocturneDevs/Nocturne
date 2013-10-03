<?php get_header(); ?>

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
			Check out our work below
		</h3>

		<a href="http://www.yourboutique.in" target="_blank">
			<div class="projectWrapper">
				<div class="projectImageWrapper">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/images/yb2.png"/>
				</div>
				<h2>YourBoutique</h2>
				<p class="content">E-Commerce website for a collective of clothing boutiques</p>
			</div>
		</a>

		<a href="http://sonify.net" target="_blank">
		<div class="projectWrapper">
			<div class="projectImageWrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/resources/images/sonify.png"/>
			</div>
			<h2>Sonify</h2>
			<p class="content">Backend for online tool to turn pictures to music</p>
		</div>
		
		<a href="http://www.thoughtarium.com" target="_blank">
		<div class="projectWrapper">
			<div class="projectImageWrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/resources/images/thoughtarium.png"/>
			</div>
			<h2>Thoughtarium</h2>
			<p class="content">Sanjay's homegrown personal blog</p>
		</div>

		<a href="http://files.nyu.edu/hm992/public/WebPhysics/balls.html" target="_blank">
		<div class="projectWrapper">
			<div class="projectImageWrapper">
				<img src="<?php echo get_template_directory_uri(); ?>/resources/images/physics.png"/>
			</div>
			<h2>Physical Space</h2>
			<p class="content">A group of JavaScript physics simulations</p>
		</div>

	</div>
	
<?php get_footer(); ?>