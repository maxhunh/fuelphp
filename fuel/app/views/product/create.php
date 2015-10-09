<ul class="nav nav-pills">
    <!-- Menote: Arr get value key index in $subnav -->
    <!-- readmore: http://fuelphp.com/docs/classes/arr.html -->
    <?php die(var_dump(Arr::get($subnav, "index" ))); ?>
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('product/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('product/create','Create');?></li>

</ul>
<p>Create</p>