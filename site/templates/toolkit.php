<?php snippet('header') ?>

<div class="row">
	<?= $page->description()->kirbytext() ?>
</div>

<div class="row mt toolkit">
	<div class="col-md-3">
		<div class="list-group list-group-flush">
			<?php foreach ($page->children() as $cat) : ?>
				<a href="<?= $cat->url() ?>" class="list-group-item list-group-item-action">
					<?= $cat->title() ?>
				</a>
			<?php endforeach ?>
		</div>
	</div>

	<!-- Bouton pour suggérer un outil -->

	<?php $tools = $page->children()->children()->limit(10) ?>

	<div class="col-md-9">
		<ul class="list-unstyled">
			<?php foreach ($tools as $tool) : ?>
				<?php snippet('media-item', array('tool' => $tool)) ?>
			<?php endforeach ?>
		</ul>
	</div>
</div>

<?php snippet('footer') ?>