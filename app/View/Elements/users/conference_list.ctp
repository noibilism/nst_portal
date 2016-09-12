<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Conference Attendance List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Tag No</th>
    <th>Group</th>
    <th>Zone</th>
    <th>Branch</th>
    <th>Phone</th>
    <th>E-Mail</th>
    <th>Payment Details</th>
    <th>Payment Status</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($attendees as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['YouthConference']['name']; ?></td>
    <td><?php echo $user['YouthConference']['gender']; ?></td>
    <td><?php echo $user['YouthConference']['tag']; ?></td>
    <td><?php echo $user['YouthConference']['group']; ?></td>
    <td><?php echo $z_name[$user['YouthConference']['zone']]; ?></td>
    <td><?php echo $b_name[$user['YouthConference']['branch']]; ?></td>
    <td><?php echo $user['YouthConference']['phone']; ?></td>
    <td><?php echo $user['YouthConference']['email']; ?></td>
    <td><?php echo $user['YouthConference']['payment_details']; ?></td>
    <td><?php echo $user['YouthConference']['verified']; ?></td>
    <td><?php echo $this->Html->link('Approve Payment', array('controller'=>'members','action'=>'approve_registration',$user['YouthConference']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>