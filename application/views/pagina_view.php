<div class='container pagina'>
<?php if ($pagina['banner'] == 1) { ?>
    <div id="banner" class="carousel slide">

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
    	<a class="carousel-control left" href="#banner" data-slide="prev">&lsaquo;</a>
    	<a class="carousel-control right" href="#banner" data-slide="next">&rsaquo;</a>
    </div>
<?php } ?>
	<div class='row tekst'>
		<div class='span7'>
			<header class="jumbotron subhead">
				<h1><?php echo $pagina['titel']; ?></h1>
			</header>
			<?php echo $pagina['tekst']; ?>
		</div>
		
		<div class='span2'>
			<br>
			<a href="http://www.jota-joti.nl"><img src="<?php echo base_url();?>images/logo_blauw.gif"></a>
		</div>
	</div>

</div>
