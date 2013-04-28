<div class='container pagina'>
<div class='row'>
    <div id="myCarousel" class="span12 carousel slide">

    	<!-- Carousel items -->
    	<div class="carousel-inner">
    		<div class="item active">
    			<center><img src="<?php echo base_url();?>images/carousel_1.png"></center>
      		</div>
    		<div class="item">
    			<center><img src="<?php echo base_url();?>images/carousel_2.png"></center>
    		</div>
    	</div>

    	<!-- Carousel nav -->
    	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>

	<div class='row tekst'>
		<div class='span9'>
			<header class="jumbotron subhead">
				<h1><?php echo $pagina['titel']; ?></h1>
			</header>
			<?php echo $pagina['tekst']; ?>
		</div>
		
		<div class='span2'>
			<a href="http://www.jota-joti.nl"><img src="<?php echo base_url();?>images/logo_blauw.gif"></a>
		</div>
	</div>

	<div class='row'>
		<div class='span4 offset8'>
			<small>Laatste aanpassing: <?php echo $pagina['timestamp']; ?></small>
		</div>
	</div>
</div>
