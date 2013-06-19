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
            <P>Als je van de JOTA-JOTI-organisatie een inlognaam en wachtwoord hebt ontvangen om in te loggen op deze website, kun je dat doen door onderstaande velden in te vullen. Heb je geen inlognaam en wachtwoord ontvangen en ben je van mening dat je deze wel zou moeten hebben, neem dan even contact op met de JOTA-JOTI-organisatie om deze aan te vragen.</P>            <P>Als je per ongeluk hier terecht bent gekomen, klik dan rustig verder via bovenstaand menu. We wensen je veel plezier met de rest van de website!</P>
            <P>If you don't understand the text above, please visit the international JOTA-JOTI website.
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
				<label class="control-label" for="email"><em>E-mailadres</em></label>
				<div class="controls">
					<input type='text' name='email' id='email' size='25'>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="password"><em>Wachtwoord</em></label>
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
