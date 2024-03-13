<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NewsAuthor $newsAuthor
 * @var \Cake\Collection\CollectionInterface|string[] $news
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List News Authors'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="newsAuthors form content">
            <?= $this->Form->create($newsAuthor) ?>
            <fieldset>
                <legend><?= __('Add News Author') ?></legend>
                <?php
                    echo $this->Form->control('news_id', ['options' => $news]);
                    echo $this->Form->control('news_author_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
