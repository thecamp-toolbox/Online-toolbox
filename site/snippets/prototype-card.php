<div class="col-sm-4">
	<div class="card mb-6">
		<a href="<?= $p->url() ?>">
			<div class="card-img-top">
				<?php if ($p->hasImages()) : ?>
		    		<?php $img = $p->images()->first() ?>
		    		<div class="cover-img" style="background-image:url('<?= $img->url() ?>')">
		    			<div class="cover-meta">
		    				<?php $diff = $p->difficulty()->int() ?>
		    				<?php snippet('stars', array('diff' => $diff)) ?>
		    			</div>
		    		</div>
		    	<?php else : ?>
		    		<div class="cover-img"></div>
		    	<?php endif ?>
		    </div>
	    </a>
		<div class="card-body caption">
			<a href="<?= $p->url() ?>">
		    	<h4 class="card-title">
		    		<?= $p->title() ?>
	    		</h4>
		    </a>
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		</div>
	</div>
</div>

