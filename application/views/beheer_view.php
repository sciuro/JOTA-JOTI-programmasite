<div class="container">
	<h1>Beheer themateam website</h1>

	<div class="row">
		<div class="span12">
    		<ul class="nav nav-tabs">
        	<?php if ($tab == "algemeen"){ ?>
        	<li class="active">
        	<?php } else { ?>
        	<li>
        		<?php } ?>
    				<a href="<?php echo base_url();?>beheer/opties/algemeen">Algemeen</a>
    			</li>

        	<?php if ($tab == "artikelen"){ ?>
        	<li class="active">
        	<?php } else { ?>
        	<li>
        		<?php } ?>
    				<a href="<?php echo base_url();?>beheer/opties/artikelen">Artikelen</a>
    			</li>
				
        	<?php if ($tab == "gebieden"){ ?>
        	<li class="active">
        	<?php } else { ?>
        	<li>
        		<?php } ?>
    				<a href="<?php echo base_url();?>beheer/opties/gebieden">Gebieden</a>
    			</li>

          <?php if ($tab == "speltakken"){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
            <?php } ?>
            <a href="<?php echo base_url();?>beheer/opties/speltakken">Speltakken</a>
          </li>

          <?php if ($tab == "duur"){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
            <?php } ?>
            <a href="<?php echo base_url();?>beheer/opties/duur">Duur</a>
          </li>

    		</ul>
    	</div>
    </div>

    <?php if ($tab == "algemeen"){ ?>
    <h3>Algemene instellingen</h3>

   	<?php } elseif ($tab == "artikelen") { ?>
    <h3>Artikelen</h3>

    <?php } elseif ($tab == "gebieden") { ?>
    <h3>Activiteitengebieden</h3>

    <?php } elseif ($tab == "speltakken") { ?>

    <?php $attributes = array('class' => 'form-horizontal');
    echo form_open('beheer/save/'.$tab, $attributes); ?>

    </form>

    <?php } elseif ($tab == "duur") { ?>
    <h3>Totale programmaduur</h3>

	


   		<div class="control-group">
   			<label class="control-label" for="proxyhost">Proxy servername:</label>
   			<div class="controls">
   				<input type="text" id="proxyhost" name="proxyhost" placeholder="Proxy servername" value="<?php echo $setting['proxyhost']; ?>">
   				<input type="text" id="proxyhost" name="proxyport" class="input-small" placeholder="8080" value="<?php echo $setting['proxyport']; ?>">
   			</div>
   		</div>

   		<div class="control-group">
   			<label class="control-label" for="http">Proxy type:</label>
   			<div class="controls">
   				<?php if ($setting['proxytype'] == "http") {$checked = 'checked';} else {$checked=''; } ?>
   				<label class="radio"><input type="radio" name="proxytype" value="http" <?php echo $checked; ?>>HTTP</label>
   				<?php if ($setting['proxytype'] == "socks5") {$checked = 'checked';} else {$checked=''; } ?>
   				<label class="radio"><input type="radio" name="proxytype" value="socks5" <?php echo $checked; ?>>Socks5</label>
   			</div>
   		</div>

   		<div class="control-group">
   			<label class="control-label" for="proxyauth">Proxy authentication:</label>
   			<div class="controls">
   				<input type="text" id="proxyauth" name="proxyuser" class="input-small" placeholder="Username"  value="<?php echo $setting['proxyuser']; ?>">
    			<input type="password" id="proxyauth" name="proxypassword" class="input-small" placeholder="Password" value="<?php echo $setting['proxypassword']; ?>">
   			</div>
   		</div>

   		<div class="control-group">
   			<div class="controls">
   				<button type="submit" class="btn">Submit</button>
   			</div>
   		</div>

    </form>

    <?php } ?>

</div>
