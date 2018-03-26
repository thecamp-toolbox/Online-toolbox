<?php snippet('header') ?>


<div class="row mt toolkit">
	<div class="col-md-3">
		<div class="list-group list-group-flush">
			<?php foreach ($page->parent()->children() as $cat) : ?>
				<?php if ($page->url() == $cat->url()) : ?>
					<?php $active = 'active' ?>
				<?php endif ?>
				<a href="<?= $cat->url() ?>" class="list-group-item list-group-item-action <?= $active ?>">
					<?= $cat->title() ?>
				</a>
				<?php $active = '' ?>
			<?php endforeach ?>
		</div>
	</div>
	<div class="col-md-9">
		<ul class="list-unstyled">
		  <?php foreach ($page->children() as $tool) : ?>
				<?php snippet('media-item', array('tool' => $tool)) ?>
			<?php endforeach ?>
		</ul>
	</div>
</div>

<?php snippet('footer') ?>