<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="<?= $site->url() ?>">
	      	<img src="<?= $site->url()?>/assets/images/mini.png">
	    </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php foreach ($pages->visible() as $p) : ?>
          <li class="<?php e($p->isOpen(),'active') ?>">
            <a href="<?= $p->url() ?>">
              <?= $p->title() ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
        	<a href="#">
        		<i class="fa fa-user"></i>
        	</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div>
</nav>