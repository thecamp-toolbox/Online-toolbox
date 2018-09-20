<?php snippet('header') ?>

</div>
<section class="bg-white pb-3 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-2 mb-sm-0">
            	<?php if ($page->postimage() != '') : ?>
	            	<!-- Convert the filename to a full file object -->
					<?php $coverimage = $page->postimage()->toFile(); ?>
	                <img alt="Image" src="<?php echo $coverimage->url() ?>" class="rounded img-fluid" />
	            <?php endif ?>
            </div>
            <!--end of col-->
            <div class="col-lg-4 d-flex flex-column justify-content-between mr-auto ml-auto">
                <div>
                    <h1 class="mb-2 mt-3"><?= $page->title() ?></h1>
                    <h2 class="lead mb-3"><?= $page->baseline() ?></h2>

                    <hr class="short">

                    <!-- Dev state pour tools -->
					<?php if ($page->state() != '') : ?>
						<div class="mt-3">
							<p class="text-muted">État de développement : <?= $page->state() ?></p>
						</div>
					<?php endif ?>

                    <div class="mt-3">
                        <!-- Aller chercher les catégories -->
						<?php if ($page->categories() != '') : ?>
							<?php foreach ($page->categories()->split() as $cat) : ?>
								<?php $thecat = page('typologies')->children()->find($cat) ?>
								<a href="<?= $site->url().'/toolbox/cat:'.$cat ?>">
									<span class="badge badge-secondary badge-pill"><?= $thecat->title() ?></span>
								</a>
							<?php endforeach ?>
						<?php endif ?>

						<!-- Aller chercher les objectifs -->
						<?php if ($page->goal() != '') : ?>
							<?php foreach ($page->goal()->split() as $goal) : ?>
								<?php $thegoal = page('goals')->children()->find($goal) ?>
								<a href="<?= $site->url().'/toolbox/goal:'.$goal ?>">
									<span class="badge badge-primary badge-pill"><?= $thegoal->title() ?></span>
								</a>
							<?php endforeach ?>
						<?php endif ?>

						<!-- Aller chercher le focus -->
						<?php if ($page->focus() != '') : ?>
							<?php foreach ($page->focus()->split() as $focus) : ?>
								<?php $thefocus = page('focuses')->children()->find($focus) ?>
								<a href="<?= $site->url().'/toolbox/focus:'.$focus ?>">
									<span class="badge badge-info badge-pill"><?= $thefocus->title() ?></span>
								</a>
							<?php endforeach ?>
						<?php endif ?>



                    </div>
                </div>
                
                <?php if ($page->hasDocuments()) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-lg">
                        	
                        	<?php if ($page->documents()->count() > 1) { 
                        		echo 'Téléchargements';
                        	} else {
                        		echo 'Téléchargement';
                        	}?>
                    	</button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split dropdown-toggle-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-caret-down"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-sm">
                        	<?php foreach ($page->documents() as $doc) : ?>
                        		<a class="dropdown-item" href="<?= $doc->url() ?>" download>
                        			<?php e($doc->title() != '',$doc->title(),$doc->filename()) ?> (<?= $doc->niceSize() ?>)
                        		</a>
                        	<?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<!--end of section-->
<section class="space-sm">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md-8 col-lg-7">
                <h5 class="mb-4">Description</h5>
                <article>
                    <?= $page->description()->kirbytext() ?>
                </article>
               
            </div>
            <!--end of col-->

            <div class="col-12 col-md-4">

            	<?php if ($page->partner() != '') : ?>
            		<div class="card">
	                    <div class="card-body">
	                    	<span class="title-decorative">Partenaire</span>
	                        <ul class="list-unstyled list-spacing-sm">

	                            <li>
	                                <a class="media" href="<?= $page->partnerurl() ?>" target="_blank">
	                                	<?php if ($page->partnerlogo() != '') : ?>
	                                		<?php $logo = $page->partnerlogo()->toFile() ?>
	                                		<img alt="Image" src="<?= $logo->url() ?>" class="avatar avatar-sm mr-3" />
	                                	<?php endif ?>
	                                    
	                                    <div class="media-body">
	                                        <span class="h6 mb-0"><?= $page->partner() ?></span>
	                                        <?php if ($page->partnerrole() != '') : ?>
		                                        <span class="text-muted"><?= $page->partnerrole() ?></span>
		                                    <?php endif ?>
	                                    </div>

	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
            	<?php endif ?>

            	<?php if ($page->repo() != '') : ?>
	            	<a class="btn btn-outline-secondary btn-block" href="<?= $page->repo() ?>" target="_blank">
	            		<i class="fa fa-github mr-1"></i> Voir sur Gihub
	                </a>
	            <?php endif ?>

            </div>
            <!--end of col-->
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<!--end of section-->

<!-- Navigation -->
<div class="container">
	<div class="row bmt justify-content-center">
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
</div>

 <div class="container">

<?php snippet('footer') ?>