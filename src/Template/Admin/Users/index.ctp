
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Utilisateurs') ?> <small><?= $this->Html->link(__('[ Ajouter un utilisateur ]'), ['controller' => 'users', 'action' => 'add']) ?></small></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name', 'Prénom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pseudo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Créé le') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->pseudo) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= $this->Number->format($user->role) ?></td>
                <td><?= h($user->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Premier')) ?>
            <?= $this->Paginator->prev('< ' . __('Précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
            <?= $this->Paginator->last(__('Dernier') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} sur {{pages}}, {{current}} utilisateur(s) sur {{count}}')]) ?></p>
    </div>
</div>
