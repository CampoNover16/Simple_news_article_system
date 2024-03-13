<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\News> $news
 */
?>
<div class="news index content">
    <div>
        <?= $this->Html->link('News List', ['controller' => 'News', 'action' => 'index'], ['class' => 'link-class']) ?> || 
        <?= $this->Html->link('Author List', ['controller' => 'Authors', 'action' => 'index'], ['class' => 'link-class']) ?>
    </div>
    <?= $this->Html->link(__('New News'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('News') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $news): ?>
                <tr>
                    <td><?= $this->Number->format($news->id) ?></td>
                    <td><?= h($news->title) ?></td>
                    <td><?= h($news->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $news->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $news->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
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
    <div id="example-news-get"></div>
</div>
<script>
$(document).ready(function() {
    var exampleArticleId = 3;
    $.ajax({
        url: '/news/getArticleById/' + exampleArticleId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var articleContainer = $('#example-news-get');
            articleContainer.empty();

            if (response.length === 0) {
                articleContainer.append('<p>No article found by given ID.</p>');
            } else {
                articleContainer.append('<h2>Example API call of news get by given id.</h2>');
            }

            articleContainer.append('<li><b>ID:</b> ' + response.id + ' <b>Title:</b> ' + response.title + ' <b>Text:</b> ' + response.text + '</li>');
        },
        error: function(xhr, status, error) {
            console.error('There is no item with given ID');
        }
    });
});
</script>
