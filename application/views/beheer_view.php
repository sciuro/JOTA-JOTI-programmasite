<div class="container pagina">
  <div class='row-fluid tekst'>
    <div class='span7 offset1'>
      <header class="jumbotron subhead">
        <h1><?php echo $titel; ?></h1>
      </header>
    </div>
  </div>


	<div class="row-fluid">
		<div class="span10 offset1">

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

          <?php if ($tab == "spellokaties"){ ?>
          <li class="active">
          <?php } else { ?>
          <li>
            <?php } ?>
            <a href="<?php echo base_url();?>beheer/opties/spellokaties">Spellokaties</a>
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

          <li class="span2"></li>
          <li><button href="#nieuw" role="button" class="btn btn-primary" data-toggle="modal">Nieuw</button></li>
    	</ul>

    </div>
  </div>

  <div class="row-fluid">
    <div class="span10 offset1">

    <?php if ($tab == "algemeen"){ ?>
    Algemene instellingen

    <?php // Artikelen tabblad. ?>
   	<?php } elseif ($tab == "artikelen") { ?>

      <table class="table table-hover">
        
        <thead>
          <tr>
            <th class="span2"></th>
            <th class="span4">Artikel</th>
            <th>Meervoud</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach ($artikelen as $artikel) { ?>
          <tr>
            <td><a href="#veranderartikel<?php echo $artikel['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
                
                <?php if (!$artikel['aantal']) { ?>
                <a href="<?php echo base_url(); ?>beheer/verwijder/artikelen/<?php echo $artikel['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
                <?php } else { ?>
                <span class="badge"><i class="icon-remove icon-white"></i></span>
                <?php } ?>

                <?php // De overlay voor het veranderen van nieuwe artikelen. ?>
                <div id="veranderartikel<?php echo $artikel['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Verander artikel</h3>
                </div>
                <?php $attributes = array('class' => 'form-horizontal');
                      echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
                <div class="modal-body">
                  <p>Verander artikel</p>

                  <div class="control-group">
                    <label class="control-label" for="artikel">Lengte:</label>
                      <div class="controls">
                        <input type="text" id="artikel" name="naam" placeholder="Artikelnaam" value="<?php echo $artikel['naam']; ?>">
                        <input type="text" id="artikel" name="naammv" placeholder="Meervoud" value="<?php echo $artikel['naammv']; ?>">
                        <input type="hidden" name="artikelid" value="<?php echo $artikel['id']; ?>">
                      </div>

                  </div>

                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                  </div>

                </form>

                </td>
            <td><?php echo $artikel['naam'];?></td>
            <td><?php echo $artikel['naammv'];?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>


        <?php // De overlay voor het toevoegen van nieuwe artikelen. ?>
        <div id="nieuw" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Nieuw artikel</h3>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
            <div class="modal-body">
              <p>Nieuwe artikel</p>

              <div class="control-group">
                <label class="control-label" for="artikel">Naam:</label>
                <div class="controls">
                  <input type="text" id="artikel" name="naam" placeholder="Artikelnaam">
                  <input type="text" id="artikel" name="naammv" placeholder="Meervoud">
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>

          </form>
        </div>


    <?php // Gebieden tabblad. ?>
    <?php } elseif ($tab == "gebieden") { ?>

      <table class="table table-hover">
        
        <thead>
          <tr>
            <th class="span2"></th>
            <th class="span4">Gebieden</th>
            <th>Speltak</th>
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
            <td><?php echo $gebied['naam'];?></td>
            <td><?php echo $gebied['speltak'];?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

        <?php // De overlay voor het toevoegen van nieuwe gebieden. ?>
        <div id="nieuw" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<?php // Spellokaties tabblad ?>
    <?php } elseif ($tab == "spellokaties") { ?>

      <table class="table table-hover">
        
        <thead>
          <tr>
            <th class="span2"></th>
            <th>Spellokatie</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach ($spellokaties as $spellokatie) { ?>
          <tr>
            <td><a href="#veranderspellokatie<?php echo $spellokatie['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
                
                <?php if (!$spellokatie['aantal']) { ?>
                <a href="<?php echo base_url(); ?>beheer/verwijder/spellokaties/<?php echo $spellokatie['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
                <?php } else { ?>
                <span class="badge"><i class="icon-remove icon-white"></i></span>
                <?php } ?>

                <?php // De overlay voor het toevoegen van nieuwe speltakken. ?>
                <div id="veranderspellokatie<?php echo $spellokatie['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Verander spellokatie</h3>
                </div>
                <?php $attributes = array('class' => 'form-horizontal');
                      echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
                <div class="modal-body">
                  <p>Verander spellokatie</p>

                  <div class="control-group">
                    <label class="control-label" for="spellokatie">Lokatie:</label>
                      <div class="controls">
                        <input type="text" id="spellokatie" name="spellokatie" placeholder="Spellokatie" value="<?php echo $spellokatie['naam']; ?>">
                        <input type="hidden" name="spellokatieid" value="<?php echo $spellokatie['id']; ?>">
                      </div>

                  </div>

                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                  </div>

                </form>

                </td>
            <td><?php echo $spellokatie['naam'];?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

        <?php // De overlay voor het toevoegen van nieuwe speltakken. ?>
        <div id="nieuw" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Nieuwe spellokatie</h3>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
            <div class="modal-body">
              <p>Nieuwe spellokatie</p>

              <div class="control-group">
                <label class="control-label" for="spellokatie">Lokatie:</label>
                <div class="controls">
                  <input type="text" id="spellokatie" name="spellokatie" placeholder="Spellokatie">
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>

          </form>
        </div>

    <?php // Speltakken tabblad ?>
    <?php } elseif ($tab == "speltakken") { ?>

      <table class="table table-hover">
        
        <thead>
          <tr>
            <th class="span2"></th>
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

        <?php // De overlay voor het toevoegen van nieuwe speltakken. ?>
        <div id="nieuw" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

    <?php } elseif ($tab == "duur") { ?>

      <table class="table table-hover">
        
        <thead>
          <tr>
            <th class="span2"></th>
            <th>Programmaduur</th>
          </tr>
        </thead>
        
        <tbody>
          <?php foreach ($duur as $programma) { ?>
          <tr>
            <td><a href="#veranderduur<?php echo $programma['id']; ?>" data-toggle="modal"><span class="badge badge-info"><i class="icon-pencil icon-white"></i></span></a>
                
                <?php if (!$programma['aantal']) { ?>
                <a href="<?php echo base_url(); ?>beheer/verwijder/duur/<?php echo $programma['id']; ?>"><span class="badge badge-important"><i class="icon-remove icon-white"></i></span></a>
                <?php } else { ?>
                <span class="badge"><i class="icon-remove icon-white"></i></span>
                <?php } ?>

                <?php // De overlay voor het toevoegen van nieuwe programma's. ?>
                <div id="veranderduur<?php echo $programma['id']; ?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 id="myModalLabel">Verander programmaduur</h3>
                </div>
                <?php $attributes = array('class' => 'form-horizontal');
                      echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
                <div class="modal-body">
                  <p>Verander programmaduur</p>

                  <div class="control-group">
                    <label class="control-label" for="duur">Lengte:</label>
                      <div class="controls">
                        <input type="text" id="duur" name="lengte" placeholder="Aantal uren" value="<?php echo $programma['lengte']; ?>">
                        <input type="hidden" name="duurid" value="<?php echo $programma['id']; ?>">
                      </div>

                  </div>

                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Opslaan</button>
                  </div>

                </form>

                </td>
            <td><?php echo $programma['lengte'];?> uur</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

        <?php // De overlay voor het toevoegen van nieuwe programmaduur. ?>
        <div id="nieuw" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Nieuw programmaduur</h3>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
                echo form_open('beheer/opslaan/'.$tab, $attributes); ?>
            <div class="modal-body">
              <p>Nieuwe programmaduur</p>

              <div class="control-group">
                <label class="control-label" for="duur">Naam:</label>
                <div class="controls">
                  <input type="text" id="duur" name="lengte" placeholder="Aantal uren">
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <button type="submit" class="btn btn-primary">Opslaan</button>
            </div>

          </form>
        </div>

    <?php } ?>

    </div>
  </div>
</div>
