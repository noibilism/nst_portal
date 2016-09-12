<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Professional Qualification List</h4>
</div>
<div class="widget-body">
    <?php echo $this->Html->link('Add A Professional Qualification', array('controller'=>'users','action'=>'add_qualification'),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <div></div>
    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>No Of Members</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($qualifications as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['Qualification']['name']; ?></td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getQualMembers',$user['Qualification']['id'],$user['Qualification']['name'],$zone,$bch)));?></td>
    <td><?php echo $this->Html->link('Update Professional Qualification', array('controller'=>'users','action'=>'update_qualification',$user['Qualification']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getQualMembers',$user['Qualification']['id'],$user['Qualification']['name'],$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>