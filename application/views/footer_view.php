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

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>