<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Professions List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><?php echo $this->Html->link('Add A Profession', array('controller'=>'users','action'=>'add_professional_group'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>No of Members</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($professions as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['Profession']['name']; ?></td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getProfMembers',$user['Profession']['id'],$zone,$bch)));?></td>
    <td><?php echo $this->Html->link('Update Profession', array('controller'=>'users','action'=>'update_professional_group',$user['Profession']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?>
        <?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getProfMembers',$user['Profession']['id'],$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>