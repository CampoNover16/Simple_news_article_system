<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsAuthor $newsAuthor
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit News Author'), ['action' => 'edit', $newsAuthor->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete News Author'), ['action' => 'delete', $newsAuthor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsAuthor->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List News Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New News Author'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="newsAuthors view content">
            <h3><?= h($newsAuthor->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('News') ?></th>
                    <td><?= $newsAuthor->has('news') ? $this->Html->link($newsAuthor->news->title, ['controller' => 'News', 'action' => 'view', $newsAuthor->news->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($newsAuthor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('News Author Id') ?></th>
                    <td><?= $this->Number->format($newsAuthor->news_author_id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related News Authors') ?></h4>
                <?php if (!empty($newsAuthor->news_authors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('News Id') ?></th>
                            <th><?= __('News Author Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($newsAuthor->news_authors as $newsAuthors) : ?>
                        <tr>
                            <td><?= h($newsAuthors->id) ?></td>
                            <td><?= h($newsAuthors->news_id) ?></td>
                            <td><?= h($newsAuthors->news_author_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'NewsAuthors', 'action' => 'view', $newsAuthors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'NewsAuthors', 'action' => 'edit', $newsAuthors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'NewsAuthors', 'action' => 'delete', $newsAuthors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsAuthors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
