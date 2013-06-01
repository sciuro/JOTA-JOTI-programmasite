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
			<?php echo form_open('login/process'); ?>
			<?php if(! is_null($msg)) echo $msg;?>

				<label for='username'>Username</label>
				<input type='text' name='username' id='username' size='25' /><br />

				<label for='password'>Password</label>
				<input type='password' name='password' id='password' size='25' /><br />

				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>
