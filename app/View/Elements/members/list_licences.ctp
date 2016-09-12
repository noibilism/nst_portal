<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Prayer Book Licences</h4>
</div>
<div class="widget-body">
    <?php echo $this->Html->link('Generate Licences', array('controller'=>'members','action'=>'generate_licences'),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th>S/N</th>
    <th>Licence Code</th>
    <th>Batch Number</th>
    <th>Used</th>
    <th>Used By</th>
    <th>Date Generated</th>
    <th>Date Used</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($lices as $member){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $member['Licence']['code']; ?></td>
    <td><?php echo $member['Licence']['batch']; ?></td>
    <td><?php echo $member['Licence']['used']; ?></td>
    <td><?php echo $member['Licence']['used_by']; ?></td>
    <td class="center"><?php echo $member['Licence']['created']; ?></td>
    <td class="center"><?php echo $member['Licence']['date_used']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<table>
    <?php if($mem > 2000){ ?>
    <?php $prev_link = str_replace('page:', '', $this->Paginator->prev('« Previous 1000'));
            $prev_link = preg_replace('/\/1"/', '"', $prev_link);
            $next_link = str_replace('page:', '', $this->Paginator->next('Next 1000 »'));
    ?>
    <tr>
        <td><?php echo $prev_link; ?></td>
        <td><?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?></td>
        <td><?php echo $next_link; ?></td>
    </tr>
    <?php } ?>
</table>
</div>
</div>
</div>