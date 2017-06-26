<h3><?php echo __('Request new barcodes'); ?></h3>
<p>
    <?php echo __('PDF will be available for download after this submition'); ?>
</p>

<?php
echo $this->Form->create('UsedBarcode', array('url' => '/barcodes/create', 'role' => 'form', 'inputDefaults' => array('label' => false, 'div' => false)));
?>
<div class="form-group">
    <?php
    echo $this->Form->label('count', __('Number of barcodes (max 150)'), array('class' => 'control-label'));
    echo $this->Form->input('count', array('type' => 'number', 'class' => 'form-control', 'min' => 1, 'max' => 150, 'required' => true));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->label('name', __('Name'), array('class' => 'control-label'));
    echo $this->Form->input('name', array('class' => 'form-control', 'required' => true));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->label('purpose', __('Purpose of barcodes'), array('class' => 'control-label'));
    echo $this->Form->input('purpose', array('class' => 'form-control', 'required' => true));
    ?>
</div>
<div class="form-group">
    <?php
    echo $this->Form->end(array('label' => 'Submit', 'class' => 'btn btn-primary pull-left', 'div' => false));

    echo $this->Html->link('Cancel', '/barcodes/home', array('class' => 'btn btn-default pull-right'));
    ?>
</div>