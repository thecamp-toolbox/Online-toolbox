<?php snippet('header') ?>


<div class="row bmt toolkit">
	<div class="col-12 col-md-auto mb-5">
		<div class="nav flex-md-column">
			<?php foreach ($page->parent()->children() as $cat) : ?>
				<?php if ($page->url() == $cat->url()) : ?>
					<?php $active = 'active' ?>
				<?php endif ?>
				<a href="<?= $cat->url() ?>" class="pl-0 nav-link <?= $active ?>">
					<?= $cat->title() ?>
				</a>
				<?php $active = '' ?>
			<?php endforeach ?>
		</div>
		<a href="mailto:arthur@thecamp.fr" class="mt-3 btn btn-outline-dark">
			Suggérer un outil
		</a>
	</div>

	<div class="col">
		<ul class="list-group list-group-flush">
		  <?php foreach ($page->children() as $tool) : ?>
				<?php snippet('media-item', array('tool' => $tool)) ?>
			<?php endforeach ?>
		</ul>
	</div>
</div>

<?php snippet('footer') ?>