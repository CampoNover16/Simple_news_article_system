<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * NewsAuthors Controller
 *
 * @property \App\Model\Table\NewsAuthorsTable $NewsAuthors
 * @method \App\Model\Entity\NewsAuthor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsAuthorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['News'],
        ];
        $newsAuthors = $this->paginate($this->NewsAuthors);

        $this->set(compact('newsAuthors'));
    }

    /**
     * View method
     *
     * @param string|null $id News Author id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsAuthor = $this->NewsAuthors->get($id, [
            'contain' => ['News'],
        ]);

        $this->set(compact('newsAuthor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsAuthor = $this->NewsAuthors->newEmptyEntity();
        if ($this->request->is('post')) {
            $newsAuthor = $this->NewsAuthors->patchEntity($newsAuthor, $this->request->getData());
            if ($this->NewsAuthors->save($newsAuthor)) {
                $this->Flash->success(__('The news author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news author could not be saved. Please, try again.'));
        }
        $news = $this->NewsAuthors->News->find('list', ['limit' => 200])->all();
        $this->set(compact('newsAuthor', 'news'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News Author id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsAuthor = $this->NewsAuthors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsAuthor = $this->NewsAuthors->patchEntity($newsAuthor, $this->request->getData());
            if ($this->NewsAuthors->save($newsAuthor)) {
                $this->Flash->success(__('The news author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news author could not be saved. Please, try again.'));
        }
        $news = $this->NewsAuthors->News->find('list', ['limit' => 200])->all();
        $this->set(compact('newsAuthor', 'news'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News Author id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsAuthor = $this->NewsAuthors->get($id);
        if ($this->NewsAuthors->delete($newsAuthor)) {
            $this->Flash->success(__('The news author has been deleted.'));
        } else {
            $this->Flash->error(__('The news author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
