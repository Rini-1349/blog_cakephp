
<div class="posts index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
            <?php foreach ($posts as $post): ?>
                <?= $post->has('category') ? $post->category->title : '' ?>
                <?= h($post->title) ?>
                <?= h($post->image) ?>
                <?= h($post->created) ?>
                <?= h($post->modified) ?>
            <?php endforeach; ?>
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
