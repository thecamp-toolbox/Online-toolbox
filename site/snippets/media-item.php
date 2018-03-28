<li class="media">
	<?php if ($tool->hasImages()) : ?>
		<img class="mr-3 athumb rounded" src="<?= $tool->images()->first()->url() ?>" alt="Generic placeholder image">
	<?php endif ?>
	<div class="media-body">
	    <h5 class="mt-0 mb-1">
	      	<?= $tool->title() ?> 
	      	<?php if ($tool->theurl() != '') : ?>
		      	<a href="<?= $tool->theurl() ?>" target="_blank">
		      		<i class="fa fa-external-link ml-1"></i>
		      	</a> 
	      	<?php endif ?>
	    </h5>
	    <p><strong>"<?= $tool->baseline() ?>"</strong></p>
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
				<a href="<?= $site->url().'/prototypes/cat:'.$cat ?>">
					<span class="badge badge-secondary"><?= $thecat->title() ?></span>
				</a>
			<?php endforeach ?>
		<?php endif ?>

		<?php if ($tool->opensource() == 'true') : ?>
			<span class="badge badge-primary">Open source</span>
		<?php endif ?>
	</div>
</li>