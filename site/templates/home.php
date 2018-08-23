<?php snippet('header') ?>
</div>

<div class="jumbotron text-right bg-white">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h2><?php echo $site->title() ?></h2>
				<?php foreach ($site->pages()->visible() as $p) : ?>
					<a href="<?= $p->url() ?>" class="btn btn-outline-dark">
						<?= $p->title() ?>
					</a>
				<?php endforeach ?>
			</div>
			<div class="col-sm-1">
			</div>
			<div class="col-sm-3">
				<img class="img-fluid" src="<?= $site->url() ?>/assets/images/undraw_creativity_wqmm.svg">
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row feature-list feature-list-sm">
		<?php foreach (page('toolbox')->children()->visible()->limit(6) as $p) : ?>
			<?php snippet('tool-card', array('p' => $p)) ?>
		<?php endforeach ?>
	</div>

	<div class="row">
		<div class="col-12 col-md-6 col-lg-4">
			<div class="card">
				<div class="card-body">
					<a href="<?= $site->url() ?>/vocabulary">
						<h5 class="card-title mb-2">
							Vocabulaire au hasard 
						</h5>
					</a>
					<ul>
					<?php foreach (page('vocabulary')->vocab()->toStructure()->shuffle()->limit(8) as $v) : ?>
						<li>
							<a href="<?= $site->url() ?>/vocabulary#<?= slug($v->title()) ?>"><?= $v->title() ?></a>
						</li>
					<?php endforeach ?>
					<li>...</li>
				</ul>
				</div>
			</div>
		</div>

		<div class="col-6 col-md-6 col-lg-8">
			<div class="card">
				<div class="card-body">
					<a href="<?= $site->url() ?>/toolkit">
						<h5 class="card-title mb-3">
							Outils au hasard (voir tous)
						</h5>
					</a>
					<ul class="list-group list-group-flush">
					  <?php foreach (page('toolkit')->children()->children()->shuffle()->limit(2) as $tool) : ?>
							<?php snippet('media-item', array('tool' => $tool)) ?>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</div>


<?php snippet('footer') ?>