<?php $soudif = 5 - $diff ?>
<?php if ($diff != '') : ?>
	<?php while ($diff > 0) : ?>
		<i class="fa fa-exclamation-circle"></i>
		<?php $diff-- ?>
	<?php endwhile ?>
	<?php while ($soudif > 0) : ?>
		<i class="fa fa-circle-o"></i>
		<?php $soudif-- ?>
	<?php endwhile ?>
<?php endif ?>