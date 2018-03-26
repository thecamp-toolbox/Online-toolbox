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
	</div>
</li>