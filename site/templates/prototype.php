<?php snippet('header') ?>


<div class="card-group bmt">
	<div class="card left-card"> <!-- carte de gauche -->
		<div class="the-cover card-img-top" style="background-image:url('<?php echo $page->images()->first()->url() ?>')">
			<img class="img-fluid hidden-img" src="<?php echo $page->images()->first()->url() ?>"> 
		</div>
	    <div class="card-body">
	    	<?php if ($page->imgcredit() != '') : ?>
				<p class="card-text"><small class="text-muted"><?= l::get('imgcredit') ?>: <?= $page->imgcredit() ?></small></p>
			<?php endif ?>

			<!-- Documents en téléchargement -->
			<?php if ($page->hasDocuments()) : ?>
				<h4 class="mt">Téléchargement(s)</h4>
				<?php foreach ($page->documents() as $doc) : ?>
					<a href="<?= $doc->url() ?>" class="btn btn-default btn-block" download>
						<?= $doc->filename() ?> (<?= $doc->niceSize() ?>)<i class="fa fa-download fa-left"></i>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<!-- Examples (liens) -->
			<?php if ($page->examples() != '') : ?>
				<h4 class="mt"><?= l::get('examples') ?></h4>
					<ul class="sidebar">
					<?php foreach ($page->examples()->toStructure() as $ex) : ?>
						<li>
							<a href="<?= $ex->exlink() ?>" target="_blank">
								<?= $ex->title() ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>

			<!-- Outils (liens) -->
			<?php if ($page->tools() != '') : ?>
				<h4 class="mt"><?= l::get('tools') ?></h4>
				<ul class="sidebar">
					<?php foreach ($page->tools()->toStructure() as $tool) : ?>
					<li>
						<a href="<?= $tool->toollink() ?>" target="_blank">
							<?= $tool->title() ?> 
							<?php if ($tool->type() != '') : ?>
							 (<?= $tool->type() ?>)
							<?php endif ?>
						</a>
					</li>
					<?php endforeach ?>
				</ul>
			<?php endif ?> 

			<!-- Outils (liens) -->
			<?php if ($page->sources() != '') : ?>
				<h4 class="mt"><?= l::get('references') ?></h4>
				<ul class="sidebar">
					<?php foreach ($page->sources()->toStructure() as $sou) : ?>
					<li>
						<a href="<?= $sou->sourcelink() ?>" target="_blank">
							<?= $sou->title() ?> 
						</a>
					</li>
					<?php endforeach ?>
				</ul>
			<?php endif ?> 
	    </div> <!-- Fin card-body -->
	  </div> <!-- Fin card -->


	  <div class="card"> <!-- carte de droite -->
	  
	    <div class="card-body">

	    <!-- Dans le futur, mettre : https://getbootstrap.com/docs/4.0/components/card/#navigation Pour commentaires etc. -->

	 	   <?php $diff = $page->difficulty()->int() ?>
			<h2><?= $page->title()->html() ?> <?php snippet('stars', array('diff' => $diff)) ?></h2>

			<?php if ($page->baseline() != '') : ?>
				<h3><?= $page->baseline() ?></h3>
			<?php endif ?>

			<!-- Aller chercher les catégories -->
			<?php if ($page->categories() != '') : ?>
				<?php foreach ($page->categories()->split() as $cat) : ?>
					<?php $thecat = page('typologies')->children()->find($cat) ?>
					<a href="<?= $site->url().'/prototypes/cat:'.$cat ?>">
						<span class="badge badge-secondary"><?= $thecat->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<!-- Aller chercher les objectifs -->
			<?php if ($page->goal() != '') : ?>
				<?php foreach ($page->goal()->split() as $goal) : ?>
					<?php $thegoal = page('goals')->children()->find($goal) ?>
					<a href="<?= $site->url().'/prototypes/goal:'.$goal ?>">
						<span class="badge badge-primary"><?= $thegoal->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<!-- Aller chercher le focus -->
			<?php if ($page->focus() != '') : ?>
				<?php foreach ($page->focus()->split() as $focus) : ?>
					<?php $thefocus = page('focuses')->children()->find($focus) ?>
					<a href="<?= $site->url().'/prototypes/focus:'.$focus ?>">
						<span class="badge badge-info"><?= $thefocus->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<hr>

	      	<p class="card-text"><?= $page->description()->kirbytext() ?></p>
	    
	    </div>

	    <div id="close"> <!-- Bouton pour retour -->
			<a href="<?= $page->parent()->url() ?>">
				✖
			</a>
		</div>

	</div> <!-- fin card right -->
</div> <!-- fin card group -->

<!-- Navigation -->
<div class="bmt">
	<nav aria-label="Page navigation">
	  <ul class="pagination justify-content-center">
	  	<?php if($prev = $page->prevVisible()): ?>
		    <li class="page-item">
		    	<a href="<?= $prev->url() ?>" class="page-link">&larr; <?= $prev->title() ?></a>
		    </li>
		<?php endif ?>
		<?php if($next = $page->nextVisible()): ?>
	        <li class="page-item">
	        	<a href="<?= $next->url() ?>" class="page-link"><?= $next->title() ?> &rarr;</span></a>
	        </li>
	     <?php endif ?>
	  </ul>
	</nav>
</div>

<?php snippet('footer') ?>