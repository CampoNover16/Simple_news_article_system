<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\News $news
 */

    //var_dump($newsAuthors);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List News'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="news form content">
            <?= $this->Form->create($news) ?>
            <fieldset>
                <legend><?= __('Add News') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('text');
                ?>
                <legend><?= __('Authors') ?></legend>
                <?php foreach ($newsAuthors as $author): ?>
                    <?= $this->Form->checkbox(
                        'selected_authors[]',
                        ['value' => $author['id']]
                    ); ?>
                    <?= $author['name'] ?><br>
                <?php endforeach; ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
