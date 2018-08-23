<?php snippet('header') ?>


<div class="row mt documentation">
	<div class="col-12 col-md-2 mb-5 bmt">
		<?php foreach (page('Documentation')->children() as $doc) : ?>
			<h6 class="title-decorative mb-2"><?= ($doc->title()) ?></h5>
			<nav class="nav flex-md-column">
				<?php foreach ($doc->children() as $cat) : ?>
					<?php if ($page->url() == $cat->url()) : ?>
						<?php $active = 'active' ?>
					<?php endif ?>
						<a href="<?= $cat->url() ?>" class="nav-link <?= $active ?>">
							<?= $cat->title() ?>
						</a>
						<?php $active = '' ?>
				<?php endforeach ?>
			</nav>
			<hr class="short">
		<?php endforeach ?>
	</div>
	<div class="col mt">
		<h1><?= $page->title() ?></h1>
		<hr>
		<?= $page->description()->kirbytext() ?>
		<?php if ($site->user()) : ?>
			<a href="<?= $site->url().'/panel/pages/'.$page->id().'/edit' ?>" class="subtle">edit</a>
		<?php endif ?>
	</div>
</div> <!-- end row --> 

<?php snippet('footer') ?>