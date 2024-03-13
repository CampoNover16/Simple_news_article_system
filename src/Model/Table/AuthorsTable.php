<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\FrozenTime;

class AuthorsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('authors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('NewsAuthors', [
            'foreignKey' => 'author_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    public function getArticlesByAuthorId($authorId)
    {
        return $this->NewsAuthors->find()
            ->contain(['News'])
            ->where(['NewsAuthors.author_id' => $authorId])
            ->toArray();
    }

    public function getTopAuthorsLastWeek()
    {
        // Calculate the date for one week ago
        $oneWeekAgo = FrozenTime::now()->subWeek();

        // Format the date in MySQL TIMESTAMP format (YYYY-MM-DD HH:MM:SS)
        $formattedDate = $oneWeekAgo->format('Y-m-d H:i:s');

        // Fetch the count of articles written by each author within the last week
        return $this->find()
            ->select(['Authors.id', 'Authors.name', 'article_count' => $this->NewsAuthors->find()->select(['count' => 'COUNT(*)'])->where(function ($exp) use ($formattedDate) {
                return $exp->gte('News.created', $formattedDate);
            })->where(function ($exp) {
                return $exp->equalFields('NewsAuthors.author_id', 'Authors.id');
            })])
            ->leftJoinWith('NewsAuthors.News')
            ->group(['Authors.id'])
            ->orderDesc('article_count')
            ->limit(3)
            ->toArray();
    }
}