<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List News'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New News'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="news view content">
            <h3><?= h($news->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($news->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($news->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($news->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Text') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($news->text)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('News Authors') ?></h4>
                <?php foreach ($authorNames as $authorName): ?>
                    <li><?= h($authorName) ?></li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
