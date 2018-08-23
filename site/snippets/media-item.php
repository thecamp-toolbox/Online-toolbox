<li class="media">
	<?php if ($tool->hasImages()) : ?>
		<a href="<?= $tool->theurl() ?>" target="_blank">
			<img class="mr-3 athumb rounded" src="<?= $tool->images()->first()->url() ?>" alt="<?= $tool->title() ?> logo">
		</a>
	<?php endif ?>
	<div class="media-body">
	    <h5 class="mt-0 mb-1">
	      	 
	      	<?php if ($tool->theurl() != '') : ?>
		      	<a href="<?= $tool->theurl() ?>" target="_blank">
		      		<?= $tool->title() ?>
		      		<i class="fa fa-external-link ml-1"></i>
		      	</a> 
	      	<?php endif ?>
	    </h5>
	    <h6 class="title-decorative mb-1"><?= $tool->baseline() ?></h6>
		<?= $tool->description()->kirbytext() ?>
		<!-- 
	    <a href="#">
		    <span class="badge badge-info">Prototypage</span>
		</a>
		<span class="badge badge-primary">Visualisation</span>
		<span class="badge badge-dark">Collaboration</span>
		<span class="badge badge-success"><i class="fa fa-users"></i></span>
		-->
		<!-- Aller chercher les catégories -->
		<?php if ($tool->categories() != '') : ?>
			<?php foreach ($tool->categories()->split() as $cat) : ?>
				<?php $thecat = page('typologies')->children()->find($cat) ?>
					<span class="badge badge-secondary badge-pill mb-2"><?= $thecat->title() ?></span>
			<?php endforeach ?>
		<?php endif ?>

		<?php if ($tool->opensource() == 'true') : ?>
			<span class="badge badge-primary badge-pill mb-2">Open source</span>
		<?php endif ?>
	</div>
</li>