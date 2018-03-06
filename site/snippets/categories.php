<div class="card-group">
	<?php foreach (page('categories')->children()->visible() as $cat) : ?>
		<div class="card text-center" style="width: 25%;">
			<img class="card-img-top" src="<?= $cat->images()->first()->url() ?>" alt="">
			<div class="card-body">
				<strong class="card-title"><?= $cat->num() ?> - <?= $cat->title() ?></strong>
				<div class="card-text">
					<!-- <?= $cat->text()->kirbytext() ?> -->
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>