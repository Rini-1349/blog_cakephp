<div class="row"></div>
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <?php echo $this->Form->create(null, ['enctype'=>'multipart/form-data']); ?>
                <div class="form-group">
                    <?php echo $this->Form->file('file', ['class'=>'form-control']) ?>
                </div>
                <?php 
                echo $this->Form->button('Upload', ['class'=>'btn btn-primary']);
                echo $this->Html->link('Back', ['action'=>'index'], ['class'=>'btn btn-success']);
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>