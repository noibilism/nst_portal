<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Users List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><?php echo $this->Html->link('Add Super Admin', array('controller'=>'users','action'=>'add_super_admin'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
    <th><?php echo $this->Html->link('Add Zonal Admin', array('controller'=>'users','action'=>'add_zone_admin'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
    <th><?php echo $this->Html->link('Add Branch Admin', array('controller'=>'users','action'=>'add_branch_admin'),array('class'=>'btn btn-primary DTTT_button_copy'));?></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Username</th>
    <th>E-Mail</th>
    <th>Role</th>
    <th>Last Login</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($users as $user){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $user['User']['username']; ?></td>
    <td><?php echo $user['User']['email']; ?></td>
    <td class="center"><?php echo $user['User']['role_id']; ?></td>
    <td class="center"><?php echo $user['User']['last_login']; ?></td>
    <td><?php echo $this->Html->link('Update User', array('controller'=>'users','action'=>'update_user',$user['User']['id'],$user['User']['role_id']),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>