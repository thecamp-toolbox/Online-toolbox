<?php snippet('header') ?>


<div class="row mt documentation">
	<div class="col-md-3 bmt">
		<?php foreach (page('Documentation')->children() as $doc) : ?>
			<h5><?= ($doc->title()) ?></h5>
			<ul class="nav flex-column">
				<?php foreach ($doc->children() as $cat) : ?>
					<?php if ($page->url() == $cat->url()) : ?>
						<?php $active = 'active' ?>
					<?php endif ?>
					<li class="nav-item">
						<a href="<?= $cat->url() ?>" class="nav-link <?= $active ?>">
							<?= $cat->title() ?>
						</a>
						<?php $active = '' ?>
					</li>
				<?php endforeach ?>
			</ul>
		<?php endforeach ?>
	</div>
	<div class="col-md-9">
		<h1><?= $page->title() ?></h1>
		<hr>
		<?= $page->description()->kirbytext() ?>
		<?php if ($site->user()) : ?>
			<a href="<?= $site->url().'/panel/pages/'.$page->id().'/edit' ?>" class="subtle">edit</a>
		<?php endif ?>
	</div>
</div> <!-- end row --> 

<?php snippet('footer') ?>