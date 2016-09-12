<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Membership Status List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><?php echo $this->Html->link('Add A Membership Status', array('controller'=>'users','action'=>'add_membership_status'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($MembershipStatuses as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['MembershipStatus']['name']; ?></td>
    <td><?php echo $this->Html->link('Update Membership Status', array('controller'=>'users','action'=>'update_membership_status',$user['MembershipStatus']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?>
        <?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getStatusMembers',$user['MembershipStatus']['id'],$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>

</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>