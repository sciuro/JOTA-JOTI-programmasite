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

<?php if (isset($page)) {
if ($page == "leiding") { ?>
	<!-- selecteer alles -->
	<script type="text/javascript">
	// Listen for click on toggle checkbox
	$('#select-all').click(function(event) {   
    	if(this.checked) {
        	// Iterate each checkbox
        	$(':checkbox').each(function() {
            	this.checked = true;                        
        	});
    	} else {
    		// Iterate each checkbox
        	$(':checkbox').each(function() {
            	this.checked = false;                        
        	});
    	}
	});
	</script>
<?php } } ?>

</body>
</html>