<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Users List</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy">Add A User</a></div></th>
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
    <td></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>