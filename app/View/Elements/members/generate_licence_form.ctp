<div class="widget widget-gray widget-body-white">
    <div class="widget-head">
        <h3 class="heading">Generate Prayer Book Licences</h3>
    </div>
    <?php echo $this->Form->create('Member');?>
    <div class="widget-body">
        <div class="col-md-6">
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Number of Licences</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('Licence.no', array('class'=>'col-md-12 form-control','label'=>false)); ?>
            </div>
            <div class="widget widget-4 row">
                <div class="widget-head"><h4 class="heading">Batch Code</h4></div>
                <div class="separator"></div>
                <?php echo $this->Form->input('Licence.batch', array('class'=>'col-md-12 form-control','label'=>false,'readonly'=>'readonly','value'=>$batch)); ?>
            </div>
            <?php echo $this->Form->submit(__('Generate Licences'), array('class' => 'btn btn-large btn-primary'));?>
        </div>
    </div>
</div>