<div class='container pagina'>
	<div class='row-fluid tekst'>
		<div class='span7 offset1'>
			<header class="jumbotron subhead">
				<h1><?php echo $titel; ?></h1>
			</header>
		</div>
	</div>

	<div class='row-fluid'>
		<div class='span12'>

<!--<script src="<?php echo base_url();?>assets/flot/jquery.js"></script>-->



                <script type="text/javascript">
                $(function () {
                    var hits = { label: "hits per uur", data: [
                    [1370466000000, 22], [1370505600000, 7], [1370509200000, 18], [1370520000000, 25], [1370548800000, 1], [1370617200000, 3], [1370642400000, 2], [1370779200000, 60], [1370782800000, 92], [1370786400000, 69], [1370790000000, 25], [1370797200000, 21], [1370800800000, 18], [1370844000000, 6], [1370887200000, 25], [1370890800000, 35], [1370894400000, 35], [1370898000000, 58], [1370973600000, 68], [1370977200000, 62], [1370980800000, 118], [1370984400000, 81], [1370988000000, 31], [1370991600000, 18], [1371013200000, 1], [1371056400000, 5], [1371060000000, 15], [1371063600000, 18], [1371067200000, 32], [1371070800000, 3],
                    ],
                    bars: {show:true} };
            
                $.plot(
                    $("#graph_hits_ph"),
                    [hits],
                    { xaxis: { mode: "time" }}
                    );

                });
                </script>

                <div id="graph_hits_ph" style="width:600px;height:300px;"></div>

		</div>
	</div>

</div>



