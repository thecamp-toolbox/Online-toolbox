<?php snippet('header') ?>

<div class="row mt">
	<?php foreach (page('prototypes')->children()->shuffle()->limit(6) as $p) : ?>
		<?php snippet('prototype-card', array('p' => $p)) ?>
	<?php endforeach ?>
</div>

<div class="mt center">
	<a class="btn btn-outline-primary" href="/prototypes"><?= l::get('seeall') ?> <i class="fa fa-arrow-right"></i></a>
</div>

<?php snippet('footer') ?>