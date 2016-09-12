<div class="innerLR">
<div class="widget widget-4">
<div class="widget-head">
    <h4 class="heading">Members List</h4>
    <p style="color: red; font-size: 22px; font-family: Calibri;">Ramadan Mubaraq!: <marquee>Salam Alaykum, watch our Prime TV Programme for Ramadan. NASFAT HALF HOUR on MITV 4am to 4.20am everyday of Ramadan.</marquee></p>
</div>
<div class="widget-body">
    <?php echo $this->Html->link('Add A Member', array('controller'=>'members','action'=>'create_member'),array('class'=>'btn btn-primary DTTT_button_copy'));?>

    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed colVis">
<thead>
<tr>
    <th>S/N</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Name</th>
    <th>Sex</th>
    <th>Branch</th>
    <th>Zone</th>
    <th>Registration Number</th>
    <th>Phone Number</th>
    <th>E-Mail Address</th>
    <th>Portal Access Code</th>
    <th>Occupation</th>
    <th>Marital Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($members as $member){ ?>
<tr class="gradeX">
    <td><?php echo $i++; ?></td>
    <td><?php echo $member['PersonalProfile']['first_name']; ?></td>
    <td><?php echo $member['PersonalProfile']['last_name']; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['other_name']; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['sex']; ?></td>
    <td class="center"><?php echo $b_name[$member['PersonalProfile']['branch_id']]; ?></td>
    <td class="center"><?php echo $z_name[$member['PersonalProfile']['zone_id']]; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['reg_no']; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['phone']; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['email']; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['access_code']; ?></td>
    <td class="center"><?php echo $p_name[$member['PersonalProfile']['prof_id']]; ?></td>
    <td class="center"><?php echo $member['PersonalProfile']['mar_status']; ?></td>
    <td>
    <?php echo $this->Html->image('edit1.gif', array('url'=>array('controller'=>'members','action'=>'update_profile',$member['PersonalProfile']['id'])),array('title'=>'btn btn-primary DTTT_button_copy'));?>
    <?php echo $this->Html->image('pix.gif', array('url'=>array('controller'=>'members','action'=>'update_picture',$member['PersonalProfile']['id'])),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    <?php echo $this->Html->image('view.png', array('url'=>array('controller'=>'members','action'=>'view_profile',$member['PersonalProfile']['id'])),array('class'=>'btn btn-primary DTTT_button_copy'));?>
    </td>
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