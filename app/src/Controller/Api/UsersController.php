<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Error\Exception\ValidationErrorException;
use Cake\Event\EventInterface;

class UsersController extends AppController
{

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'order' => [
            'Users.surname' => 'desc',
        ],
    ];

    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->set('data', $this->Users->find());
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (!$this->Users->save($user)) {
                throw new ValidationErrorException($user);
            }
        }

        $this->set('data', $user);
        $this->set('_serialize', true);
    }

    public function update($id = null)
    {
        $this->request->allowMethod(['put']);

        $user = $this->Users->get($id);

        if ($this->request->is('put')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (!$this->Users->save($user)) {
                throw new ValidationErrorException($user);
            }
        }

        $this->set('data', $user);
        $this->set('_serialize', true);
    }

    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        $user = $this->Users->get($id);

        $this->set('data', $user);
        $this->set('_serialize', true);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);

        $user = $this->Users->get($id);

        if (!$this->Users->delete($user)) {
            throw new ValidationErrorException($user);
        }

        $this->set('message', 'Successfully deleted');
        $this->set('_serialize', true);
    }
}
