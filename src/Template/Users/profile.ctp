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
                <th scope="col"><?= $this->Paginator->sort('image', 'Images') ?></th>
                <th scope="col"><?= __('Créé le') ?></th>
                <th scope="col"><?= __('Modifié le') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->posts as $post): ?>
            <tr>
                <td><?= h($post->category->title) ?></td>
                <td><?= h($post->title) ?></td>
                <td><?= h($post->content) ?></td>
                <td>
                    <?php foreach($post->images as $image)
                    {
                    ?>
                        <img src="<?= $image['path'] ?>" alt="<?= $image['name'] ?>">
                    <?php
                    }
                    if ($user->id == $loggedUser['id'])
                    {
                        echo $this->Html->link(__('[ Ajouter une photo ]'), ['controller' => 'images', 'action' => 'upload', $post->id]);
                    }
                    ?>
                </td>
                <td><?= h($post->created) ?></td>
                <td><?= h($post->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['controller' => 'Posts', 'action' => 'view', $post->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['controller' => 'Posts', 'action' => 'edit', $post->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Posts', 'action' => 'delete', $post->id], ['confirm' => __('Êtes-vous sûr(e) de vouloir supprimer cet article ?')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
