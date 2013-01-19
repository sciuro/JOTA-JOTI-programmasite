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

    <?php // Gebieden tabblad. ?>
    <?php } elseif ($tab == "gebieden") { ?>

    <div class='row'>    
      <table class="table table-hover span4 offset4">
        
        <thead>
          <tr>
            <th></th>
            <th>Speltak</th>
            <th>Gebieden</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach ($gebieden as $gebied) { ?>
          <tr>
            <td><a href="#verandergebied<?php echo $gebied['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
                
                <?php if (!$gebied['aantal']) { ?>
                <a href="<?php echo base_url(); ?>beheer/verwijder/gebied/<?php echo $gebied['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
                <?php } else { ?>
                <span class="badge"><i class="icon-remove icon-white"></i></span>
                <?php } ?>

                <?php // De overlay voor het toevoegen van nieuwe gebieden. ?>
                <div id="verandergebied<?php echo $gebied['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Verander gebied</h3>
                </div>
                <?php $attributes = array('class' => 'form-horizontal');
                      echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
                <div class="modal-body">
                  <p>Verander gebied</p>

                  <div class="control-group">
                    <label class="control-label" for="gebiednaam">Naam:</label>
                      <div class="controls">
                        <input type="text" id="gebiednaam" name="gebiednaam" placeholder="Gebiednaam" value="<?php echo $gebied['naam']; ?>">
                        <input type="hidden" name="gebiedid" value="<?php echo $gebied['id']; ?>">
                      </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label" for="speltak">Speltak:</label>
                      <div class="controls">
                        <?php foreach ($speltakken as $speltak) { ?>
                          <?php if ($gebied['speltakid'] == $speltak['id']) {$checked = 'checked';} else {$checked=''; } ?>
                          <label class="radio"><input type="radio" name="speltakid" value="<?php echo $speltak['id']; ?>" <?php echo $checked; ?>><?php echo $speltak['naam']; ?></label>
                        <?php } ?>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                  </div>

                </form>

                </td>
            <td><?php echo $gebied['speltak'];?></td>
            <td><?php echo $gebied['naam'];?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class='row'>
      <div class='span1 offset6'>
        <a href="#nieuwgebied" role="button" class="btn" data-toggle="modal">Nieuw</a>

        <?php // De overlay voor het toevoegen van nieuwe gebieden. ?>
        <div id="nieuwgebied" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Nieuw gebied</h3>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
            <div class="modal-body">
              <p>Nieuwe gebied</p>

              <div class="control-group">
                <label class="control-label" for="gebiednaam">Naam:</label>
                <div class="controls">
                  <input type="text" id="gebiednaam" name="gebiednaam" placeholder="Gebiednaam">
                </div>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="speltak">Speltak:</label>
                <div class="controls">
                  <?php foreach ($speltakken as $speltak) { ?>
                    <label class="radio"><input type="radio" name="speltakid" value="<?php echo $speltak['id']; ?>"><?php echo $speltak['naam']; ?></label>
                  <?php } ?>
                </div>
              </div>

            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>

          </form>

        </div>

      </div>
    </div>


    <?php // Speltakken tabblad ?>
    <?php } elseif ($tab == "speltakken") { ?>

    <div class='row'>    
      <table class="table table-hover span3 offset4">
        
        <thead>
          <tr>
            <th></th>
            <th>Speltak</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach ($speltakken as $speltak) { ?>
          <tr>
            <td><a href="#veranderspeltak<?php echo $speltak['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
                
                <?php if (!$speltak['aantal']) { ?>
                <a href="<?php echo base_url(); ?>beheer/verwijder/speltak/<?php echo $speltak['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
                <?php } else { ?>
                <span class="badge"><i class="icon-remove icon-white"></i></span>
                <?php } ?>

                <?php // De overlay voor het toevoegen van nieuwe speltakken. ?>
                <div id="veranderspeltak<?php echo $speltak['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Verander speltak</h3>
                </div>
                <?php $attributes = array('class' => 'form-horizontal');
                      echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
                <div class="modal-body">
                  <p>Verander speltak</p>

                  <div class="control-group">
                    <label class="control-label" for="speltaknaam">Naam:</label>
                      <div class="controls">
                        <input type="text" id="speltaknaam" name="speltaknaam" placeholder="Speltaknaam" value="<?php echo $speltak['naam']; ?>">
                        <input type="hidden" name="speltakid" value="<?php echo $speltak['id']; ?>">
                      </div>

                  </div>

                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                  </div>

                </form>

                </td>
            <td><?php echo $speltak['naam'];?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class='row'>
      <div class='span1 offset6'>
        <a href="#nieuwspeltak" role="button" class="btn" data-toggle="modal">Nieuw</a>

        <?php // De overlay voor het toevoegen van nieuwe speltakken. ?>
        <div id="nieuwspeltak" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Nieuwe speltak</h3>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
            <div class="modal-body">
              <p>Nieuwe speltak</p>

              <div class="control-group">
                <label class="control-label" for="speltaknaam">Naam:</label>
                <div class="controls">
                  <input type="text" id="speltaknaam" name="speltaknaam" placeholder="Speltaknaam">
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>

          </form>

        </div>

      </div>
    </div>






    <?php } elseif ($tab == "duur") { ?>
    <h3>Totale programmaduur</h3>

	
        <?php $attributes = array('class' => 'form-horizontal');
    echo form_open('beheer/save/'.$tab, $attributes); ?>
    </form>

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
