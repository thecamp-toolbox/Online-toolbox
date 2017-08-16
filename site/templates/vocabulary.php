<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<?php foreach ($page->vocab()->toStructure() as $vocab) : ?>
	<hr>
	<h3><?= $vocab->title() ?></h3>
	<?= $vocab->answer()->kirbytext() ?>
<?php endforeach ?>

<?php snippet('footer') ?>