<table class="table table-hover">
    <thead>
        <tr>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $key => $value): ?>
            <tr>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->description; ?></td>
                <td><?php echo $value->price; ?></td>
                <td><?php echo Html::anchor('product/view/'. $value->id, 'View');?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<br/>
<ul class="nav nav-pills">
    <!-- Menote: Arr get value key index in $subnav -->
    <!-- readmore: http://fuelphp.com/docs/classes/arr.html -->
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('product/create','Create');?></li>
</ul>
<p>Index</p>