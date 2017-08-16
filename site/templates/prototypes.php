<?php snippet('header') ?>

<?php 
	$goal = param('goal');
	$focus = param('focus');

	if ($goal != '') {
		$noGoal = '';
	} else {
		$noGoal = 'active';
	}
	if ($focus != '') {
		$noFocus = '';
	} else {
		$noFocus = 'active';
	}
?>

<div class="row">
	<div class="col-md-6">
		<ul class="nav nav-pills mt">
			<?php $goals = page('goals')->children() ?>
			<li class="nav-item">
				<a class="nav-link disabled" href="#"><?= page('goals')->title().' :' ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php echo $noGoal ?>" href="<?= $site->url().'/prototypes' ?>">Tous</a>
			</li>
			<?php foreach ($goals as $g) : ?>
				<li class="nav-item">
					<a class="nav-link <?php if ($goal == $g->uid()) {echo 'active';} ?>" href="<?= $page->url() ?>/goal:<?= $g->uid() ?>">
						<?= $g->title() ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
	
	<div class="col-md-6">
		<ul class="nav nav-pills mt">
			<?php $focuses = page('focuses')->children() ?>
			<li class="nav-item">
				<a class="nav-link disabled" href="#"><?= page('focuses')->title().' :' ?></a>
				</li>
			<li class="nav-item">
				<a class="nav-link <?php echo $noFocus ?>" href="<?= $site->url().'/prototypes' ?>">Tous</a>
			</li>
			<?php foreach ($focuses as $f) : ?>
				<li class="nav-item">
					<a class="nav-link <?php if ($focus == $f->uid()) {echo 'active';} ?>" href="<?= $page->url() ?>/focus:<?= $f->uid() ?>">
						<?= $f->title() ?>
					</a>
				</li>
			<?php endforeach ?>	
		</ul>
	</div>
</div>


<?php 
	$prototypes = $page->children();

	if ($goal = param('goal')) {
		$prototypes = $prototypes->filterBy('goal', $goal, ',');
	}

	if ($focus = param('focus')) {
		$prototypes = $prototypes->filterBy('focus', $focus, ',');
	}

	if ($cat = param('cat')) {
		$prototypes = $prototypes->filterBy('categories', $cat, ',');	
	}
?>

<div class="row mt">
	<?php foreach ($prototypes->sortBy('difficulty', 'asc') as $p) : ?>
		<?php snippet('prototype-card', array('p' => $p)) ?>
	<?php endforeach ?>
</div>

<?php snippet('footer') ?>