<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Author'), ['action' => 'edit', $author->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Author'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Author'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Author'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="author view content">
            <h3><?= h($author->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($author->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($author->name)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
