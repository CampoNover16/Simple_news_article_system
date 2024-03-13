<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Author> $author
 */
?>
<div class="author index content">
    <div>
        <?= $this->Html->link('News List', ['controller' => 'News', 'action' => 'index'], ['class' => 'link-class']) ?> || 
        <?= $this->Html->link('Author List', ['controller' => 'Authors', 'action' => 'index'], ['class' => 'link-class']) ?>
    </div>
    <?= $this->Html->link(__('New Author'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Author') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th class="name"><?= __('Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author): ?>
                <tr>
                    <td><?= $this->Number->format($author->id) ?></td>
                    <td><?= $author->name ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $author->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $author->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]) ?>
                        <?= $this->Html->link(__('Find all authors'), '#', [
                            'class' => 'find-authors-button',
                            'data-author-id' => $author->id,
                        ]) ?>
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
    <div><ul id="authors-container"></ul></div>
    <div><ul id="top-authors-container"></ul></div>
</div>
<script>
$(document).ready(function() {
    $('.find-authors-button').on('click', function(event) {
        event.preventDefault();
        
        var authorId = $(this).data('author-id');

        $.ajax({
            url: '/authors/articlesByAuthorId/' + authorId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var authorsArticlesContainer = $('#authors-container');
                authorsArticlesContainer.empty();
                authorsArticlesContainer.append('<h2>All articles of Author with id = <b>' + authorId + '</b></h2>');

                if (response.length === 0) {
                    authorsArticlesContainer.append('<p>No articles found for this author.</p>');
                } else {
                    response.forEach(function(items) {
                        authorsArticlesContainer.append('<li><b>ID:</b> ' + items.news.id + ' <b>Title:</b> ' + items.news.title + ' <b>Text:</b> ' + items.news.text + '</li>');
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
$(document).ready(function() {
    $.ajax({
        url: '/authors/topAuthorsLastWeek',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var topAuthorsContainer = $('#top-authors-container');
            topAuthorsContainer.empty();
            topAuthorsContainer.append('<h2>Top 3 authors that wrote the most articles last week.</h2>');

            response.forEach(function(items) {
                topAuthorsContainer.append('<li><b>ID:</b> ' + items.id + ' <b>Title:</b> ' + items.name + ' <b>Text:</b> ' + items.article_count + '</li>');
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>