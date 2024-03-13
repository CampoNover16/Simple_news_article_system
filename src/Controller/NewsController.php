<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * News Controller
 *
 * @method \App\Model\Entity\News[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $news = $this->paginate($this->News);

        $this->set(compact('news'));
    }

    /**
     * View method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
{
    $news = $this->News->get($id, [
        'contain' => [
            'NewsAuthors' => [
                'fields' => ['news_id', 'author_id'],
                'Authors' => ['fields' => ['name']]
            ]
        ]
    ]);

    $authorNames = [];
    foreach ($news->news_authors as $newsAuthor) {
        $authorNames[] = $newsAuthor->author->name;
    }

    $this->set(compact('news', 'authorNames'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Authors');
        $this->loadModel('NewsAuthors');

        $news = $this->News->newEmptyEntity();
        if ($this->request->is('post')) {

            $news = $this->News->patchEntity($news, $this->request->getData());

            if ($this->News->save($news)) {
                $selectedAuthors = $this->request->getData('selected_authors');
                $selectedAuthors = array_map('intval', $selectedAuthors);
                $selectedAuthors = array_filter($selectedAuthors, function($value) {
                    return $value > 0;
                });
                
                if (!empty($selectedAuthors)) {
                    
                    foreach ($selectedAuthors as $authorId) {
                        $newsAuthorsData[] = [
                            'news_id' => $news->id,
                            'author_id' => $authorId
                        ];
                    }

                    $newsAuthorsEntities = $this->News->NewsAuthors->newEntities($newsAuthorsData);
                    $this->News->NewsAuthors->saveMany($newsAuthorsEntities);
                }
                $this->Flash->success(__('The news has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news could not be saved. Please, try again.'));
        }
        
        $newsAuthors = $this->Authors->find('all')->toArray();

        $this->set(compact('news', 'newsAuthors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Authors');
        $this->loadModel('NewsAuthors');
    
        $news = $this->News->get($id, [
            'contain' => ['NewsAuthors']
        ]);
    
        $selectedAuthorsIds = collection($news->news_authors)->extract('author_id')->toArray();
    
        if ($this->request->is(['post', 'put'])) {
            $news = $this->News->patchEntity($news, $this->request->getData());
    
            if ($this->News->save($news)) {
                $selectedAuthors = $this->request->getData('selected_authors');
                $selectedAuthors = array_map('intval', $selectedAuthors);
                $selectedAuthors = array_filter($selectedAuthors, function($value) {
                    return $value > 0;
                });

                $currentAuthorsIds = collection($news->news_authors)->extract('author_id')->toArray();
                $associationsToDelete = array_diff($currentAuthorsIds, $selectedAuthors);
    
                if (!empty($associationsToDelete)) {
                    $this->NewsAuthors->deleteAll([
                        'news_id' => $news->id,
                        'author_id IN' => $associationsToDelete
                    ]);
                }

                $newsAuthorsData = [];
                foreach ($selectedAuthors as $authorId) {
                    $newsAuthorsData[] = [
                        'news_id' => $news->id,
                        'author_id' => $authorId
                    ];
                }

                $newsAuthorsEntities = $this->NewsAuthors->newEntities($newsAuthorsData);
                $this->NewsAuthors->saveMany($newsAuthorsEntities);
    
                $this->Flash->success(__('The news has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news could not be saved. Please, try again.'));
        }

        $newsAuthors = $this->Authors->find('all')->toArray();
    
        $this->set(compact('news', 'newsAuthors', 'selectedAuthorsIds'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $news = $this->News->get($id, [
            'contain' => ['NewsAuthors']
        ]);

        foreach ($news->news_authors as $newsAuthor) {
            $this->News->NewsAuthors->delete($newsAuthor);
        }

        if ($this->News->delete($news)) {
            $this->Flash->success(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getArticleById($newsId)
    {
        $this->request->allowMethod(['get']);
        $this->autoRender = false;

        $news = $this->News->get($newsId);
        
        $this->response = $this->response->withType('application/json');
        echo json_encode($news);
    }
}
