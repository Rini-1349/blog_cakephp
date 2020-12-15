
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Ajouter un utilisateur') ?></legend>
        <?php
            echo $this->Form->control('name', ['label' => 'Nom']);
            echo $this->Form->control('first_name', ['label' => 'Prénom']);
            echo $this->Form->control('pseudo', ['label' => 'Pseudo']);
            echo $this->Form->control('email', ['label' => 'E-mail']);
            echo $this->Form->control('password', ['label' => 'Mot de passe']);
            echo $this->Form->control('password_confirm', ['label' => 'Confirmation de mot de passe', 'type' => 'password']);
            echo $this->Form->control('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Valider')) ?>
    <?= $this->Form->end() ?>
</div>
