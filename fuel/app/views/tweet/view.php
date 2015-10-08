<h2>Viewing <span class='muted'>#<?php echo $tweet->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $tweet->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $tweet->body; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $tweet->description; ?></p>

<?php echo Html::anchor('tweet/edit/'.$tweet->id, 'Edit'); ?> |
<?php echo Html::anchor('tweet', 'Back'); ?>