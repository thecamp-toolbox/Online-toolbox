<div class="bmt">
	<hr>
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4 center">
			<a href="http://thecamp.fr" target="_blank">
				<img src="<?= $site->url() ?>/assets/images/logo-thecamp-s.png">
			</a>
		</div>
		<div class="col-sm-4 right">
			Code disponible sur Github
		</div>
	</div>
</div>

</div> <!-- fin content --> 

	<?php echo js('assets/js/jquery-3.2.1.min.js') ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha256-+oeQRyZyY2StGafEsvKyDuEGNzJWAbWqiO2L/ctxF6c=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function() {
			$('.caption').matchHeight();
		});
	</script>

	<!-- Bootstrap Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<?= js('assets/plugins/embed/js/embed.js') ?>

</body>

</html>