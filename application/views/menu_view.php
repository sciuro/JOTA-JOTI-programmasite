<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo base_url();?>">Jota-Joti</a>

            <div class="nav-collapse collapse">
                <ul class="nav">

                    <?php if ($page == "home"){ ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url();?>info/pagina/home">Home</a></li>
                      
                    <?php if ($page == "algemeen"){ ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url();?>info/pagina/algemeen">Algemeen</a></li>
                    
                    <?php if ($page == "spelen"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Spelen</a>
						<ul class="dropdown-menu" role="menu">
							<li><a tabindex="-1" href="<?php echo base_url();?>info/pagina/spelen">Algemeen</a></li>
                            <li class="divider"></li>
							<li><a tabindex="-1" href="<?php echo base_url();?>overzicht/bevers/">Bevers</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>overzicht/welpen/">Welpen</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>overzicht/scouts/">Scouts</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>overzicht/explorers/">Explorers</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>overzicht/roverscouts/">Roverscouts</a></li>

						</ul>
					</li>

                    <?php if ($page == "beheer"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beheer</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>beheer">Instellingen</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>beheer/spel">Spelen</a></li>
                        </ul>
                    </li>
                 
                </ul>
            </div>
        </div>
    </div>
</div>
