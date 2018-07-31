<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tables Controller
 *
 * @property \App\Model\Table\TablesTable $Tables
 *
 * @method \App\Model\Entity\Table[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('counter');
        
        $q = $this->Promotions->PromotionsUsers->find();
        $q->select([$q->func()->count('*')]);
        
        $Tables=$this->Tables->find()
                            ->select([
                                'id',
                                'name',
                                'status',
                                'kot_amount' => $q->where(['PromotionsUsers.promotion_id = Promotions.id']),
                                'total_view' => $q2->where(['PromotionsViews.promotion_id = Promotions.id'])
                            ]);

        $this->set(compact('Tables'));
    }

    public function saveTable()
    {
        $this->viewBuilder()->layout('');
        
        $c_name=$this->request->query('c_name');
        $c_mobile=$this->request->query('c_mobile');
        $c_pax=$this->request->query('c_pax');
        $table_id=$this->request->query('table_id');
        $Table=$this->Tables->get($table_id);
        $Table->status='occupied';
        $Table->c_name=$c_name;
        $Table->c_mobile=$c_mobile;
        $Table->no_of_pax=$c_pax;
        $Table->occupied_time=date( "Y-m-d H:i:s" );
        if($this->Tables->save($Table)){
            echo '1';
        }else{
            echo '0';
        }
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $table = $this->Tables->get($id, [
            'contain' => []
        ]);

        $this->set('table', $table);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $table = $this->Tables->newEntity();
        if ($this->request->is('post')) {
            $table = $this->Tables->patchEntity($table, $this->request->getData());
            if ($this->Tables->save($table)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
        $this->set(compact('table'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $table = $this->Tables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $table = $this->Tables->patchEntity($table, $this->request->getData());
            if ($this->Tables->save($table)) {
                $this->Flash->success(__('The table has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table could not be saved. Please, try again.'));
        }
        $this->set(compact('table'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Table id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $table = $this->Tables->get($id);
        if ($this->Tables->delete($table)) {
            $this->Flash->success(__('The table has been deleted.'));
        } else {
            $this->Flash->error(__('The table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
