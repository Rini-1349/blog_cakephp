
<div class="posts index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?> <small><?= $this->Html->link(__('[ Ajouter un article ]'), ['controller' => 'posts', 'action' => 'add']) ?></small></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id', 'Utilisateur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id', 'Catégorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title', 'Titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content', 'Contenu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image', 'Images') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Créé le') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Modifié le') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post->has('user') ? h($post->user->first_name . ' ' .$post->user->name) : '' ?></td>
                <td><?= $post->has('category') ? h($post->category->title) : '' ?></td>
                <td><?= h($post->title) ?></td>
                <td><?= h($post->content) ?></td>
                <td>
                    <?php foreach($post->images as $image)
                    {
                    ?>
                        <img src="<?= $image['path'] ?>" alt="<?= $image['name'] ?>">
                    <?php
                    }
                    if ($loggedUser != null AND $post->user->id == $loggedUser['id'])
                    {
                        echo $this->Html->link(__('[ Ajouter une photo ]'), ['controller' => 'images', 'action' => 'upload', $post->id]);
                    }
                    ?>
                </td>
                <td><?= h($post->created) ?></td>
                <td><?= h($post->modified) ?></td>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} sur {{pages}}, {{current}} article(s) sur {{count}}')]) ?></p>
    </div>
</div>