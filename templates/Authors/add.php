<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 * @var \Cake\Collection\CollectionInterface|string[] $news
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Author'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="author form content">
            <?= $this->Form->create($author) ?>
            <fieldset>
                <legend><?= __('Add Author') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
