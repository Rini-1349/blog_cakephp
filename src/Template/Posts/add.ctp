<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Ajouter un article') ?></legend>
        <?php
            echo $this->Form->hidden('user_id', ['value' => $loggedUser['id']]);
            echo $this->Form->control('category_id', ['options' => $categories, 'label' => 'Catégorie']);
            echo $this->Form->control('title', ['label' => 'Titre']);
            echo $this->Form->control('content', ['label' => 'Contenu']);
            echo $this->Form->control('image_file',['type'=>'file', 'label' => 'Ajouter une image']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Valider')) ?>
    <?= $this->Form->end() ?>
</div>
