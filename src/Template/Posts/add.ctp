<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('category_id', ['options' => $categories]);
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('image_file',['type'=>'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
