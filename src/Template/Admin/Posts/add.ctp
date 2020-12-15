
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Ajouter un article') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'label' => 'Utilisateur']);
            echo $this->Form->control('category_id', ['options' => $categories, 'label' => 'Catégorie']);
            echo $this->Form->control('title', ['label' => 'Titre']);
            echo $this->Form->control('content', ['label' => 'Contenu']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>
