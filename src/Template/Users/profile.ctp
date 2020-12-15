<div class="users view large-11 medium-1 columns content">
    <h3><?= h($user->pseudo) ?> <small><?= $this->Html->link(__('[ Modifier mon profil ]'), ['controller' => 'users', 'action' => 'edit', $loggedUser['id']]) ?></small></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prénom') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pseudo') ?></th>
            <td><?= h($user->pseudo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E-mail') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Membre depuis') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Mes articles') ?></h4>
        <?php if (!empty($user->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Categorie') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Contenu') ?></th>
                <th scope="col"><?= __('Créé le') ?></th>
                <th scope="col"><?= __('Modifié le') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->posts as $posts): ?>
            <tr>
                <td><?= h($posts->category->title) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->content) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Êtes-vous sûr(e) de vouloir supprimer cet article ?')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
