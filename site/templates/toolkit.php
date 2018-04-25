<?php snippet('header') ?>

<div class="row mt">
	<?= $page->description()->kirbytext() ?>
</div>

<div clas="bmt">
	<div class="card-columns">
		<?php foreach ($page->children() as $cat) : ?>
			<div class="card mb-4">
	  			<div class="card-header text-center">
	  				<a href="<?= $cat->url() ?>">
				    	<h5 class="mb-0"><?= $cat->title() ?> (<?= $cat->children()->count() ?>)</h5> 
				    </a>
				</div>
				<div class="card-body pb-3">
				  	<?php foreach ($cat->children() as $tool ) : ?>
				  		<?php if ($tool->hasImages()) : ?>
				  			<a href="<?= $tool->theurl() ?>" target="_blank">
							<img class="rounded-thumb p-2 lines" src="<?= $tool->images()->first()->url() ?>" alt="Generic placeholder image">
							</a>
						<?php endif ?>
				    <?php endforeach ?>
				</div>
			</div> <!-- end card -->
  		<?php endforeach ?>
  	</div>
</div>

<?php snippet('footer') ?>