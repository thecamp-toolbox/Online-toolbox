<a href="<?= $p->url() ?>">
	<div class="col-sm-4 col-md-3">
	    <div class="thumbnail">
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
	    	<div class="caption">
	        	<h3><?= $p->title() ?></h3>
	        	<p><?= $p->baseline() ?></p>
	    	</div>
	    </div>
	 </div>
</a>