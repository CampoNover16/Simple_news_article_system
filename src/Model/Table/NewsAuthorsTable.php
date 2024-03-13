<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class NewsAuthorsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('news_authors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('News', [
            'foreignKey' => 'news_id',
        ]);
        
        $this->belongsTo('Authors');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('news_id')
            ->notEmptyString('news_id');

        $validator
            ->integer('author_id')
            ->notEmptyString('author_id');

        return $validator;
    }
}