<ul class="breadcrumb">
    <li><a href="/" class="glyphicons home"> NASFAT Membership Portal</a></li>
    <li class="divider"></li>
    <li>Dashboard</li>
</ul>
<div class="separator bottom"></div>

<div class="heading-buttons">
    <h3 class="glyphicons display"> Dashboard</h3>
    <p style="color: red; font-size: 22px; font-family: Calibri;">Info!: <marquee>Salam Alaekum, All branches/groups are informed to send in their branch coordinates (Longitude & Latitude) so as to be listed on the NASFAT Google Map.</marquee></p>

    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="separator bottom"></div>

<div class="menubar">
    <ul>
        <li><?php echo $this->Html->link('Add A Member', array('controller'=>'members','action'=>'create_member'));?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Export All Members to Excel', array('controller'=>'members','action'=>'export_members'));?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Normalize Membership Numbering', array('controller'=>'branches','action'=>'normalize_numbering'));?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Correct Marital Status Errors', array('controller'=>'branches','action'=>'correct_status_errors'));?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Import Missing Members', array('controller'=>'branches','action'=>'import_members'));?></li>
        <li class="divider"></li>
        <li><?php echo $this->Html->link('Correct Professional Groupings', array('controller'=>'branches','action'=>'correct_professions'));?></li>
        <li class="divider"></li>
    </ul>
</div>
<?php
    $females = count($this->requestAction(array('controller' => 'Reports','action' => 'getGenderMembers','F',$bch,$zone)));
    $males = count($this->requestAction(array('controller' => 'Reports','action' => 'getGenderMembers','M',$bch,$zone)));
    $total = $males + $females;
?>
<div class="innerLR">
    <div class="row">
        <div class="col-md-4">
            <div class="widget widget-4 margin-none">
                <div class="widget-head">
                    <h4 class="heading">Statistics</h4>
                    <a href="" class="details pull-right"></a>
                </div>
                <div class="widget-body list">
                    <ul>
                        <li>
                            <span>Total Members Registered</span>
                            <span class="count"><?php echo number_format($total);?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"></span>
                        <span class="txt"><strong><?php echo number_format($females);?></strong>Females</span>
                        <div class="clearfix"></div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="widget-stats">
                        <span class="glyphicons user_add"></span>
                        <span class="txt"><strong><?php echo number_format($males);?></strong>Males</span>
                        <div class="clearfix"></div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="separator bottom"></div>

<div class="widget widget-2 widget-tabs widget-tabs-2">
    <div class="widget-head">
        <ul>
            <li class="active"><a class="glyphicons cardio" href="#website-traffic-tab" data-toggle="tab">Statistics By Zones</a></li>
        </ul>
    </div>
    <div class="widget-body">
        <div class="tab-pane active" id="website-traffic-tab">
                <div class="btn-group btn-group-vertical block">
                    <!--<a class="btn btn-icon btn-default btn-block glyphicons cargo count"> <span>687</span>Total orders</a>
                    <a class="btn btn-icon btn-default btn-block glyphicons download count"> <span>15</span>Pending orders</a>
                    <a class="btn btn-icon btn-default btn-block glyphicons download count"> <span>3</span>Pending delivery</a>
                    <a class="btn btn-icon btn-primary btn-block glyphicons fire count"> <span>5</span>Total</a>-->
                    <?php echo $this->element('zones/zones_list'); ?>
                </div>
            <div class="separator bottom"></div>
        </div>
    </div>

</div>