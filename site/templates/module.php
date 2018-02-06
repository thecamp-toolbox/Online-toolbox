<?php snippet('header') ?>


<?php snippet('card-group', array('page' => $page)) ?>

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