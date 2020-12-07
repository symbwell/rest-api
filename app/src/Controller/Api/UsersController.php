<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Error\Exception\ValidationErrorException;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;

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

    /**
     * Method return all users.
     */
    public function index()
    {
        $this->request->allowMethod(['get']);

        $this->set('data', $this->Users->find());
    }

    /**
     * Method allow to add new User. If you set nothing data, will create user only with ID.
     */
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
    }

    /**
     * Allow update user with specify ID.
     *
     * @param string|null $id
     */
    public function update(string $id = null)
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
    }

    /**
     * Allow get user with specify ID
     *
     * @param string|null $id
     */
    public function view(string $id = null)
    {
        $this->request->allowMethod(['get']);

        $user = $this->Users->get($id);

        $this->set('data', $user);
    }

    /**
     * Delete user with specify ID
     *
     * @param string|null $id
     */
    public function delete(string $id = null)
    {
        $this->request->allowMethod(['delete']);

        $user = $this->Users->get($id);

        if (!$this->Users->delete($user)) {
            throw new ValidationErrorException($user);
        }

        $this->set('message', 'Successfully deleted');
    }

    /**
     * Get user first name
     *
     * @param string|null $id
     */
    public function getUserName(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getName($id));
    }

    /**
     * Set user first name
     *
     * @param string $id
     */
    public function setUserName(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setUserName($id, $this->request->getData('toSet')));
    }

    /**
     * Get user surname
     *
     * @param string|null $id
     */
    public function getSurname(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getSurname($id));
    }

    /**
     * Set user surname
     *
     * @param string $id
     */
    public function setSurname(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setSurname($id, $this->request->getData('toSet')));
    }

    /**
     * Get user age
     *
     * @param string|null $id
     */
    public function getAge(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getAge($id));
    }

    /**
     * Set user age
     *
     * @param string $id
     */
    public function setAge(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setAge($id, $this->request->getData('toSet')));
    }

    /**
     * Get User salary
     *
     * @param string|null $id
     */
    public function getSalary(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getSalary($id));
    }

    /**
     * Set user salary
     *
     * @param string $id
     */
    public function setSalary(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setSalary($id, $this->request->getData('toSet')));
    }

    /**
     * Get user password
     *
     * @param string|null $id
     */
    public function getPassword(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getPassword($id));
    }

    /**
     * Set user password
     *
     * @param string $id
     */
    public function setPassword(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setPassword($id, $this->request->getData('toSet')));
    }

    /**
     * Get user email
     *
     * @param string|null $id
     */
    public function getEmail(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getEmail($id));
    }

    /**
     * Set user email
     *
     * @param string|null $id
     */
    public function setEmail(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setEmail($id, $this->request->getData('toSet')));
    }

    /**
     * Get user phone
     *
     * @param string|null $id
     */
    public function getPhone(string $id = null): void
    {
        $this->request->allowMethod(['get']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->getPhone($id));
    }

    /**
     * Set user phone
     *
     * @param string $id
     */
    public function setPhone(string $id = null)
    {
        $this->request->allowMethod(['put']);

        if ($id === null) {
            throw new NotFoundException('User not found. Please, specify the ID.');
        }

        $this->set('data', $this->Users->setPhone($id, $this->request->getData('toSet')));
    }
}
