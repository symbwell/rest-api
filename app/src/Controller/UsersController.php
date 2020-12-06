<?php
declare(strict_types=1);

namespace App\Controller;
use App\Error\Exception\ValidationErrorException;

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
}
