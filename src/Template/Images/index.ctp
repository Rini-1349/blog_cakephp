<p>
    <?php echo $this->Html->link('Upload File', ['action'=>'upload']) ?>
</p>
<div class="row">
    <?php
    
    foreach ($images as $image) {
        ?>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="<?php echo $image->path; ?>">
                <h4 class="card-title"><?php echo $image->name; ?></h4>          
            </div>
        </div>
        <?php
    }
    ?>
</div>