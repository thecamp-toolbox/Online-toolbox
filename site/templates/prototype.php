<?php snippet('header') ?>



<div class="card mt">

	<div class="row">

		<div class="col-md-4 mt"> <!-- Sidebar --> 
			<img class="img-responsive" src="<?php echo $page->images()->first()->url() ?>"> 
			<?php if ($page->imgcredit() != '') : ?>
				<em>Crédit image : <?= $page->imgcredit() ?></em>
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
				<h4 class="mt">Exemples</h4>
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
				<h4 class="mt">Outils</h4>
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
		</div>

		<div class="col-md-8"> <!-- Colonne principale de contenu -->
			<?php $diff = $page->difficulty()->int() ?>
			<h1><?= $page->title()->html() ?> <?php snippet('stars', array('diff' => $diff)) ?></h1>
			<?php if ($page->baseline() != '') : ?>
				<h3><?= $page->baseline() ?></h3>
			<?php endif ?>

			<!-- Aller chercher les catégories -->
			<?php if ($page->categories() != '') : ?>
				<?php foreach ($page->categories()->split() as $cat) : ?>
					<?php $thecat = page('typologies')->children()->find($cat) ?>
					<a href="<?= $site->url().'/prototypes/cat:'.$cat ?>">
						<span class="label label-default"><?= $thecat->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<!-- Aller chercher les objectifs -->
			<?php if ($page->goal() != '') : ?>
				<?php foreach ($page->goal()->split() as $goal) : ?>
					<?php $thegoal = page('goals')->children()->find($goal) ?>
					<a href="<?= $site->url().'/prototypes/goal:'.$goal ?>">
						<span class="label label-primary"><?= $thegoal->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<!-- Aller chercher le focus -->
			<?php if ($page->focus() != '') : ?>
				<?php foreach ($page->focus()->split() as $focus) : ?>
					<?php $thefocus = page('focuses')->children()->find($focus) ?>
					<a href="<?= $site->url().'/prototypes/focus:'.$focus ?>">
						<span class="label label-info"><?= $thefocus->title() ?></span>
					</a>
				<?php endforeach ?>
			<?php endif ?>

			<hr>
			<?php if ($page->description() != '') : ?>
				<?= $page->description()->kirbytext() ?>
			<?php endif ?>

			

		</div><!-- fin column -->

	</div>
</div>

<div class="container">
	<!-- Navigation -->
	<nav class="bmt">
	    <ul class="pager">
	      <?php if($prev = $page->prevVisible()): ?>
	        <li class="previous"><a href="<?= $prev->url() ?>"><span aria-hidden="true">&larr;</span> <?= $prev->title() ?></a></li>
	      <?php endif ?>
	      <?php if($next = $page->nextVisible()): ?>
	        <li class="next"><a href="<?= $next->url() ?>"><?= $next->title() ?> <span aria-hidden="true">&rarr;</span></a></li>
	      <?php endif ?>
	    </ul>
	</nav>
</div>

<?php snippet('footer') ?>