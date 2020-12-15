
<div class="posts view large-9 medium-8 columns content">
    <h3><?= h($post->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Utilisateur') ?></th>
            <td><?= $post->has('user') ? $this->Html->link($post->user->name, ['controller' => 'Users', 'action' => 'view', $post->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Catégorie') ?></th>
            <td><?= $post->has('category') ? $this->Html->link($post->category->title, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($post->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($post->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Créé le') ?></th>
            <td><?= h($post->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifié le') ?></th>
            <td><?= h($post->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Contenu') ?></h4>
        <?= $this->Text->autoParagraph(h($post->content)); ?>
    </div>
</div>
