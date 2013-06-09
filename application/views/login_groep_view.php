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
			<p>Hieronder kunnen jullie inloggen met het voor de JOTA-JOTI gekregen groepsnummer. Hierna is er toegang tot diverse extra items,
				zoals het uploaden van foto's en het invoeren van punten voor de scouts.</p>
			<br>

			<?php $attributes = array('class' => 'form-horizontal');
			echo form_open('login/process_group', $attributes); ?>

			<?php if(! is_null($msg)) { ?>
				<div class="control-group">
					<label></label>
					<div class="controls">
						<font color=red><?php echo $msg; ?></font>
					</div>
				</div>
			<?php } ?>

			<div class="control-group">
				<label class="control-label" for="groepsnummer"><em>Nummer</em></label>
				<div class="controls">
					<input type='text' name='groepsnummer' id='groepsnummer' size='25'>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label></label>
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