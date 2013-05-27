<div class="container pagina">
	<hr>
	<footer>
		<center><p>&copy; 2013 Scouting Nederland. All rights reserved.</p></center>
	</footer>
</div>

<script src="<?php echo base_url();?>assets/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<?php if (isset($pagina['banner'])) {
if ($pagina['banner'] == 1) { ?>
<script>
      $(document).ready(function(){
        $('.carousel').carousel({
          interval: 4000
        });
      });
</script>
<?php } } ?>
</body>
</html>