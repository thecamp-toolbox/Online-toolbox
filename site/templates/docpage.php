<?php snippet('header') ?>


<div class="row mt documentation">
	<div class="col-md-3">
		<nav>
			<?php foreach (page('Documentation')->children() as $doc) : ?>
				<h5><?= ($doc->title()) ?></h5>
					
				<ul class="nav flex-column">
					<?php foreach ($doc->children() as $cat) : ?>
						<li class="nav-item">
							<a href="<?= $cat->url() ?>" class="nav-link">
								<?= $cat->title() ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			<?php endforeach ?>
		</nav>
	</div>
	<div class="col-md-9">
		<h3><?= $page->title() ?></h3>
		<?= $page->description()->kirbytext() ?>
	</div>
</div>

<?php snippet('footer') ?>