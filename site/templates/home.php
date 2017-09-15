<?php snippet('header') ?>

<?php snippet('categories') ?>

<div class="row mt">
	<?php foreach (page('toolbox')->children()->visible()->shuffle()->limit(6) as $p) : ?>
		<?php snippet('tool-card', array('p' => $p)) ?>
	<?php endforeach ?>
</div>

<div class="mt center">
	<a class="btn btn-outline-primary" href="/toolbox"><?= l::get('seeall') ?> <i class="fa fa-arrow-right"></i></a>
</div>

<?php snippet('footer') ?>