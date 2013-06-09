<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo base_url();?>">JOTA-JOTI</a>

            <div class="nav-collapse collapse">
                <ul class="nav">

                    <?php if ($page == "home"){ ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url();?>info/pagina/home">Home</a></li>
                      
                    <?php if ($page == "uitleg"){ ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url();?>info/pagina/uitleg">Uitleg</a></li>
                    
                    <?php if ($page == "spellen" || $page == "twitterhike"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Spellen</a>
						<ul class="dropdown-menu" role="menu">
							<li><a tabindex="-1" href="<?php echo base_url();?>spellen/bevers/">Bevers</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>spellen/welpen/">Welpen</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>spellen/scouts/">Scouts</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>info/pagina/twitterhike">Explorers</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>info/pagina/twitterhike">Roverscouts</a></li>
						</ul>
					</li>

                    <?php if ($page == "leiding"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Leiding</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>info/pagina/leiding">Uitleg</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>spellen/overzicht">Speloverzicht</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>spellen/download">Downloaden</a></li>
                        </ul>
                    </li>

                    <?php if ($page == "contact"){ ?>
                    <li class="active">
                    <?php } else { ?>
                    <li>
                    <?php } ?>
                    <a href="<?php echo base_url();?>info/pagina/contact">Contact</a></li>

                    <?php if ($this->session->userdata('validated')) { ?>

                    <?php if ($page == "beheer"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beheer</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a tabindex="-1" href="#">Overzicht</a></li>
                            
                            <?php if ($this->session->userdata('spellen')) { ?>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>beheer/spel">Spelen</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>beheer">Onderdelen</a></li>
                            <?php } ?>

                            <?php if ($this->session->userdata('pagina')) { ?>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="<?php echo base_url();?>beheer/pagina">Pagina's</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <?php if ($page == "user"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('voornaam'); ?></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>user/">Instellingen</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>login/logout">Uitloggen</a></li>
                        </ul>
                    </li>

                    <?php } else { ?>
                    
                    <?php if ($page == "login"){ ?>
                    <li class="dropdown active">
                    <?php } else { ?>
                    <li class="dropdown">
                    <?php } ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a tabindex="-1" href="<?php echo base_url();?>login/groep">Groepen</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url();?>login/persoon">Personen</a></li>
                        </ul>
                    </li>
                    
                    <?php } ?>
                 
                </ul>
            </div>
        </div>
    </div>
</div>
