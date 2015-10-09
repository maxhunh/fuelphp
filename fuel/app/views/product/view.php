<h2>Viewing <span class='muted'>#<?php echo $product->id; ?></span></h2>

<p>
    <strong>Title:</strong>
    <?php echo $product->name; ?></p>
<p>
    <strong>Body:</strong>
    <?php echo $product->description; ?></p>
<p>
    <strong>Description:</strong>
    <?php echo $product->price; ?></p>
<?php echo Html::anchor('product', 'Back'); ?>