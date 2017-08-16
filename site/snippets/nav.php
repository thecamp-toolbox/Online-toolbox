<div class="collapse bg-light" id="navbarHeader">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 py-4">
        <h4 class="text">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
      </div>
      <div class="col-sm-4 py-4">
        <h4 class="">Toolbox</h4>
        <ul class="list-unstyled">
          <?php foreach ($pages->visible() as $p) : ?>
            <li class="<?php e($p->isOpen(),'active') ?>">
              <a href="<?= $p->url() ?>">
                <?= $p->title() ?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="navbar navbar-light bg-light">
  <div class="container d-flex justify-content-between">
    <a class="navbar-brand" href="<?= $site->url() ?>">
      <img src="<?= $site->url()?>/assets/images/mini.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</div>