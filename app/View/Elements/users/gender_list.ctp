<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Genders Grouping</h4>
</div>
<div class="widget-body">
<table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>

<tr>
    <th>S/N</th>
    <th>Gender</th>
    <th>No Of Members</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<tr class="gradeX">
    <td>1</td>
    <td>Male</td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getGenderMembers','M',$zone,$bch)));?></td>
    <td><?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getGenderMembers','M',$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
<tr class="gradeX">
    <td>2</td>
    <td>Female</td>
    <td><?php echo count($this->requestAction(array('controller' => 'Reports','action' => 'getGenderMembers','F',$zone,$bch)));?></td>
    <td><?php echo $this->Html->link('View Members', array('controller'=>'reports','action'=>'getGenderMembers','F',$zone,$bch),array('class'=>'btn btn-primary DTTT_button_copy'));?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>