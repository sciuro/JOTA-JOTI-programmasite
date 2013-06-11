<div class='container pagina'>
<?php if ($pagina['banner'] == 1) { ?>
    <div id="banner" class="carousel slide">

    	<!-- Carousel items -->
    	<div class="carousel-inner">
    		<div class="item active">
    			<center><img src="<?php echo base_url();?>images/carousel_1.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>Opening JOTA-JOTI 2012 door Andre Kuipers</p>
                </div>
      		</div>
    		<div class="item">
    			<center><img src="<?php echo base_url();?>images/carousel_2.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>Toetsenbord in elkaar zetten</p>
                </div>
    		</div>
            <div class="item">
                <center><img src="<?php echo base_url();?>images/carousel_3.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>Joti Control Center 2012</p>
                </div>
            </div>
            <div class="item">
                <center><img src="<?php echo base_url();?>images/carousel_4.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>Joti Control Center 2012</p>
                </div>
            </div>
            <div class="item">
                <center><img src="<?php echo base_url();?>images/carousel_5.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>Zenden op het landelijk station JOTA-JOTI 2012</p>
                </div>
            </div>
            <div class="item">
                <center><img src="<?php echo base_url();?>images/carousel_6.png" alt="&copy; R. Welling" title="&copy; R. Welling"></center>
                <div class="carousel-caption">
                    <p>PA6/JAM 2012</p>
                </div>
            </div>
    	</div>
    	<!-- Carousel nav -->
    	<a class="carousel-control left" href="#banner" data-slide="prev">&lsaquo;</a>
    	<a class="carousel-control right" href="#banner" data-slide="next">&rsaquo;</a>
    </div>
<?php } ?>
	<div class='row-fluid'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $pagina['titel']; ?></h1>
			</header>
        </div>
        <div class='span1'>
            <?php if ( ($this->session->userdata('validated')) && ($this->session->userdata('pagina')) ) { ?>
                <br>
                <a href="<?php echo base_url();?>beheer/pagina/<?php echo $pagina['id'];?>"><button role="button" class="btn btn-info">Edit</button></a>
            <?php } ?>
        </div>
    </div>

    <div class='row-fluid'>
        <div class='span8 offset1'>
            <?php echo $pagina['tekst']; ?>
		</div>
		<div class='span3'>
            <img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>
	</div>

</div>
