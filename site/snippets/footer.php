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
				<?= $site->footer()->kirbytext() ?>
			</div>
		</div>
	</div>

</div> <!-- fin content --> 

	<!-- Bootstrap V4 -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<!-- Faire en sorte que les cartes fassent toutes la même taille -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" integrity="sha256-+oeQRyZyY2StGafEsvKyDuEGNzJWAbWqiO2L/ctxF6c=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(function() {
			$('.caption').matchHeight();
		});
	</script>

	<?= js('assets/plugins/embed/js/embed.js') ?>

</body>

</html>