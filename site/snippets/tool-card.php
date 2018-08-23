<div class="col-12 col-md-6 col-lg-4">
	<div class="card mb-3">
		<a href="<?= $p->url() ?>">
			<div class="card-img-top">
				<?php if ($p->postimage()) : ?>
		    		<?php $img = $p->postimage()->toFile() ?>
		    		<div class="cover-img" style="background-image:url('<?= $img->url() ?>')">
		    			<?php if ($diff = $p->difficulty()->int()) : ?>
			    			<div class="cover-meta">
			    				<?php snippet('stars', array('diff' => $diff)) ?>
			    			</div>
			    		<?php endif ?>
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
		    <p class="card-text"><?= $p->baseline()->excerpt(80) ?></p>
		</div>
	</div>
</div>

