
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Connexion Admin') ?></legend>
        <?php
            echo $this->Form->control('email', ['label' => 'E-mail']);
            echo $this->Form->control('password', ['label' => 'Mot de passe']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer')) ?>
    <?= $this->Form->end() ?>
</div>