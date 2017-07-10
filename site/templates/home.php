<?php snippet('header') ?>

<h1><?php echo $site->title() ?></h1>

<div class="row mt">
	<?php foreach (page('prototypes')->children()->shuffle()->limit(8) as $p) : ?>
		<?php snippet('prototype-item', array('p' => $p)) ?>
	<?php endforeach ?>
</div>

<div class="mt center">
	<a class="btn btn-default btn-lg" href="/prototypes">Voir tous les types -></a>
</div>

<?php snippet('footer') ?>