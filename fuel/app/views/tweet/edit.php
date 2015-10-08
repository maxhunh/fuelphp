<h2>Editing <span class='muted'>Tweet</span></h2>
<br>

<?php echo render('tweet/_form'); ?>
<p>
	<?php echo Html::anchor('tweet/view/'.$tweet->id, 'View'); ?> |
	<?php echo Html::anchor('tweet', 'Back'); ?></p>
