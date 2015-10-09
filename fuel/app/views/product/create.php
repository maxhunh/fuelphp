<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>
    <div class="form-group">
        <?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

        <?php echo Form::input('name', Input::post('name', isset($product) ? $product->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

        <?php echo Form::input('description', Input::post('description', isset($product) ? $product->description : ''), array('class' =>    'col-md-4 form-control', 'placeholder'=>'Body')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Price', 'price', array('class'=>'control-label')); ?>

        <?php echo Form::input('price', Input::post('price', isset($product) ? $product->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

    </div>
    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>      </div>
</fieldset>

<?php echo Form::close(); ?>