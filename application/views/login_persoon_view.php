<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span8 offset1'>
			<p>Hieronder is het mogelijk in te loggen voor individuele personen welke hier expliciet toestemming voor
				hebben gekregen van de JOTA-JOTI organisatie. Indien je dat niet hebt, heb vooral veel plezier met de
				rest van de website en de mogelijkheden welke deze bied.</p>
			<p>Indien je van mening bent dat je een account zou moeten hebben, dan weet je ook waar je deze moet aanvragen.</p>
			<p>If you do not understand the Dutch text above, please visit the 
				<a href='http://www.scout.org/en/information_events/events/jota'>international scouts website</a>.</p>
			<br>

			<?php $attributes = array('class' => 'form-horizontal');
			echo form_open('login/process_user', $attributes); ?>

			<?php if(! is_null($msg)) { ?>
				<div class="control-group">
					<label></label>
					<div class="controls">
						<font color=red><?php echo $msg; ?></font>
					</div>
				</div>
			<?php } ?>

			<div class="control-group">
				<label class="control-label" for="email"><em>E-Mail</em></label>
				<div class="controls">
					<input type='text' name='email' id='email' size='25'>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="password"><em>wachtwoord</em></label>
				<div class="controls">
					<input type='password' name='password' id='password' size='25'>
				</div>
			</div>

			<div class="control-group">
				<label></label>
				<div class="controls">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</div>

			</form>
		</div>
		<div class='span3'>
        	<img src="<?php echo base_url();?>images/logo_blauw.gif">
		</div>
	</div>
</div>
