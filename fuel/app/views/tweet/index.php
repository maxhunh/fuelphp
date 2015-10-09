<h2>Listing <span class='muted'>Tweets</span></h2>
<br>
<?php if ($tweets): ?>
    <table class="table table-striped">
       <thead>
          <tr>
             <th>Title</th>
             <th>Body</th>
             <th>Description</th>
             <th>&nbsp;</th>
         </tr>
     </thead>
     <tbody>
        <?php foreach ($tweets as $item): ?>
            <tr>
             <td><?php echo $item->title; ?></td>
             <td><?php echo $item->body; ?></td>
             <td><?php echo $item->description; ?></td>
             <td>
                <div class="btn-toolbar">
                   <div class="btn-group">
                        <!-- Menote: Html::anchor is helper to generate html code -->
                        <!-- readmore: http://fuelphp.com/docs/classes/html.html -->
                      <?php echo Html::anchor('tweet/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
                      <?php echo Html::anchor('tweet/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>
                      <?php echo Html::anchor('tweet/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?></div>
                  </div>
              </td>
          </tr>
        <?php endforeach; ?>
     </tbody>
</table>

<?php else: ?>
    <p>No Tweets.</p>

<?php endif; ?><p>
<?php echo Html::anchor('tweet/create', 'Add new Tweet', array('class' => 'btn btn-success')); ?>

</p>
