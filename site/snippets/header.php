<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  	<!-- Latest Bootstrap compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<?= css('assets/css/main.css') ?>

	<?= css('assets/plugins/embed/css/embed.css') ?>

	<link rel="icon" type="image/png" href="<?= $site->url() ?>/assets/images/favicon.png">

</head>
<body class="mb">

		<?php snippet('nav') ?>

		<div class="container">
