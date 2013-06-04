<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<?php $attributes = array('class' => 'form-horizontal');
                echo form_open('user/opslaan', $attributes); ?>

	<div class='row-fluid'>
		<div class='span10 offset1'>
            <ul id="myTab" class="nav nav-tabs">
            	<li class="active"><a href="#algemeen" data-toggle="tab">Algemeen</a></li>
            	<li><a href="#wachtwoord" data-toggle="tab">Wachtwoord</a></li>
            	<li class='span5'></li>
            	<?php if ($this->session->flashdata('submit')) { ?>
            		<li><button type="submit" class="btn btn-success">Opslaan</button></li>
            	<?php } else { ?>
            		<li><button type="submit" class="btn btn-primary">Opslaan</button></li>
            	<?php } ?>
            </ul>
        </div>
    </div>

    <div class='row-fluid'>
		<div class='span10 offset1'>

            <div id="myTabContent" class="tab-content">

              	<div class="tab-pane fade in active" id="algemeen">
					<div class="control-group">
						<label class="control-label" for="voornaam">Voornaam</label>
						<div class="controls">
							<input type="text" id="voornaam" name="voornaam" placeholder="Voornaam" value="<?php echo $this->session->userdata('voornaam');?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="achternaam">Achternaam</label>
						<div class="controls">
							<input type="text" id="achternaam" name="achternaam" placeholder="Achternaam" value="<?php echo $this->session->userdata('achternaam');?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="email">E-Mail</label>
						<div class="controls">
							<input type="text" id="email" name="email" placeholder="E-Mail adres" value="<?php echo $this->session->userdata('email');?>">
						</div>
					</div>


				</div>

				<div class="tab-pane fade" id="wachtwoord">

					<p>Hier kun je je wachtwoord aanpassen.</p>

					<div class="control-group">
						<label class="control-label" for="password">Wachtwoord</label>
						<div class="controls">
							<input type="password" id="password" name="password" value="">
						</div>
					</div>

					<!--
					<div class="control-group">
						<label class="control-label" for="passwordcheck">Wachtwoord nogmaals</label>
						<div class="controls">
							<input type="password" id="passwordcheck" name="password" value="">
						</div>
					</div>
					-->

				</div>

			</div>
		</div>
	</div>

	</form>

</div>
