<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Zones List</h4>
</div>
<div class="widget-body">
    <?php if(empty($zones)){ ?>
    No Zones in the Database, please <a class="btn btn-primary DTTT_button_copy" href="/Zones/add_zone">Add A Zone</a>
    <?php }else{ ?>
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th><div class="DTTT btn-group"><a class="btn btn-primary DTTT_button_copy" href="/Zones/add_zone">Add A Zone</a></div></th>
</tr>
<tr>
    <th>S/N</th>
    <th>Zone</th>
    <th>Code</th>
    <th>Country</th>
    <th>No of Members</th>
    <th>Created</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($zones as $zone){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $zone['Zone']['name']; ?></td>
    <td><?php echo $zone['Zone']['code']; ?></td>
    <td class="center"><?php echo $zone['Zone']['country_id']; ?></td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getZoneMembers',$zone['Zone']['id'])));?></td>
    <td class="center"><?php echo $zone['Zone']['created']; ?></td>
    <td><?php echo $this->Html->link('Edit', array('controller'=>'Zones','action'=>'update_zone',$zone['Zone']['id']),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
</div>
</div>
</div>