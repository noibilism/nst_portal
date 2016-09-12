<?php
    function branch_count($b_id){
        $conn = new mysqli('localhost','root','root','nasfat_db');
        if($conn->connect_error){
            die('Failed');
        }

        $sql = "SELECT id FROM personal_profiles WHERE branch_id = '$b_id'";
        $result = $conn->query($sql);
        return count($result);
    }
?>
<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Branches List</h4>
</div>
<div class="widget-body">
    <?php if(empty($branches)){ ?>
    No Zones in the Database, please <a class="btn btn-primary DTTT_button_copy" href="/branches/add_branch">Add A Branch</a>
    <?php }else{ ?>
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" href="/branches/add_branch">Add A Branch</a></div></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Name</th>
    <th>Zone</th>
    <th>State</th>
    <th>Code</th>
    <th>No of Members</th>
    <th>Created</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($branches as $branch){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $branch['Branch']['name']; ?></td>
    <td><?php echo $branch['Branch']['zone_id']; ?></td>
    <td class="center"><?php echo $branch['Branch']['state_id']; ?></td>
    <td class="center"><?php echo $branch['Branch']['code']; ?></td>
    <td><?php echo number_format($this->requestAction('/Reports/countBranch/'.$branch['Branch']['id']));?></td>
    <td class="center"><?php echo $branch['Branch']['created']; ?></td>
    <td><?php echo $this->Html->link('Edit', array('controller'=>'branches','action'=>'update_branch',$branch['Branch']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <?php echo $this->Html->link('View Members', array('controller'=>'members','action'=>'list_branch_members',$branch['Branch']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>

</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
</div>
</div>
</div>