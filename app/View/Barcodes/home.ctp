
<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
        </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav navbar-right">
            <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Logout', '/users/logout', array('escape' => false)); ?></li>
        </ul>
    </div>
</nav>

<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Range</th>
            <th>Count</th>
            <th>Name</th>
            <th>Purpose</th>
            <th>Date requested</th>
            <th>PDF</th>
        </tr>
        <?php
        foreach ($barcodes as $bc) :
            ?>
            <tr>
                <td><?php echo $bc['UsedBarcode']['barcode_range']; ?></td>
                <td><?php echo $bc['UsedBarcode']['last'] - $bc['UsedBarcode']['first'] + 1; ?></td>
                <td><?php echo $bc['UsedBarcode']['name']; ?></td>
                <td><?php echo $bc['UsedBarcode']['purpose']; ?></td>
                <td><?php echo $bc['UsedBarcode']['created']; ?></td>
                <td><?php echo $this->Html->link('PDF', array('controller' => 'pdfs', 'action' => 'view_pdf', 'ext' => 'pdf', $bc['UsedBarcode']['first'], $bc['UsedBarcode']['last'])); ?></td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
</div>
<div>
    <?php echo $this->Html->link('New', '/barcodes/create', array('class' => 'btn btn-primary')); ?>
</div>
