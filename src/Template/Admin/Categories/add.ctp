
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Ajouter une catégorie') ?></legend>
        <?php
            echo $this->Form->control('title', ['label' => 'Titre']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>
