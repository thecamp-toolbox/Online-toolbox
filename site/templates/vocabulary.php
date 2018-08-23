<?php snippet('header') ?>

<h1 class="bmt"><?php echo $page->title()->html() ?></h1>

<?php foreach ($page->vocab()->toStructure()->sortBy('title') as $vocab) : ?>
	<hr class="short">
	<h5 id="<?= slug($vocab->title()) ?>"><?= $vocab->title() ?></h5>
	<?= $vocab->answer()->kirbytext() ?>
<?php endforeach ?>

<?php snippet('footer') ?>