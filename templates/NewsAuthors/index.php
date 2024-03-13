<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\NewsAuthor> $newsAuthors
 */
?>
<div class="newsAuthors index content">
    <?= $this->Html->link(__('New News Author'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('News Authors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('news_id') ?></th>
                    <th><?= $this->Paginator->sort('news_author_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsAuthors as $newsAuthor): ?>
                <tr>
                    <td><?= $this->Number->format($newsAuthor->id) ?></td>
                    <td><?= $newsAuthor->has('news') ? $this->Html->link($newsAuthor->news->title, ['controller' => 'News', 'action' => 'view', $newsAuthor->news->id]) : '' ?></td>
                    <td><?= $this->Number->format($newsAuthor->news_author_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $newsAuthor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsAuthor->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsAuthor->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
