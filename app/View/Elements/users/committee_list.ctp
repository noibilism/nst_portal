<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Commitees List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><?php echo $this->Html->link('Add A Committee', array('controller'=>'users','action'=>'add_committee'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>No Of Members</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($committees as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['Committee']['name']; ?></td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getCommitteeMembers',$user['Committee']['id'],$zone,$bch)));?></td>
    <td><?php echo $this->Html->link('Update Committee', array('controller'=>'users','action'=>'update_committee',$user['Committee']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?>
        <?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getCommitteeMembers',$user['Committee']['id'],$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>