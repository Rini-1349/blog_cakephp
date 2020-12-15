
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($category->title) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Articles associés') ?></h4>
        <?php if (!empty($category->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Contenu') ?></th>
                <th scope="col"><?= __('Créé le') ?></th>
                <th scope="col"><?= __('Modifié le') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->posts as $posts): ?>
            <tr>
                <td><?= h($posts->user_id) ?></td>
                <td><?= h($posts->category_id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->content) ?></td>
                <td><?= h($posts->created) ?></td>
                <td><?= h($posts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Modifier'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
