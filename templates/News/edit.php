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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $news->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $news->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List News'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="news form content">
            <?= $this->Form->create($news) ?>
            <fieldset>
                <legend><?= __('Edit News') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('text');
                ?>
                <legend><?= __('Authors') ?></legend>
                <?php foreach ($newsAuthors as $author): ?>
                    <?= $this->Form->checkbox(
                        'selected_authors[]',
                        ['value' => $author->id, 'checked' => in_array($author->id, $selectedAuthorsIds)]
                    ); ?>
                    <?= h($author->name) ?><br>
                <?php endforeach; ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
