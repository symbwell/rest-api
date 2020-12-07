<?php

namespace App\Test\TestCase\Controller\Api;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class UserControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public $fixtures = [
        'app.Users',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->loadRoutes();
        $this->loadFixtures('Users');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }

    public function testIndex()
    {
        $this->get('/api/users');
        $this->assertResponseOk();
    }

    public function testAdd()
    {
        $user = [
            'name' => 'weq',
            'surname' => 'e222',
            'phone' => '1321321',
        ];

        $this->post('/api/users/add', $user);
        $this->assertResponseSuccess();
        $users = $this->getTableLocator()->get('Users');
        $query = $users->find('all')->where($user)->count();
        $this->assertEquals(1, $query);
    }

    public function testView()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json'],
        ]);

        $result = $this->get('/api/users/view/27f9ca5d-7252-437d-b34b-12a3de08b23e');

        $this->assertResponseOk();

        $expected = [
            'data' => [
                'id' => '27f9ca5d-7252-437d-b34b-12a3de08b23e',
                'name' => 'Lorem ipsum dolor sit amet',
                'surname' => 'Lorem ipsum dolor sit amet',
                'age' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'salary' => "2",
                'created' => '2020-12-03T17:13:57+00:00',
                'modified' => '2020-12-03T17:13:57+00:00',
            ]
        ];

        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, (string)$this->_response->getBody());
    }

    public function testUpdate()
    {
        $toModify = [
            'name' => 'bdbdb',
            'surname' => 'e222',
            'phone' => '1321321',
        ];

        $this->put('/api/users/update/27f9ca5d-7252-437d-b34b-12a3de08b23e', $toModify);
        $this->assertResponseSuccess();
        $users = $this->getTableLocator()->get('Users');
        $query = $users->find()->where(['name' => 'bdbdb', 'surname' => 'e222', 'phone' => '1321321']);

        $this->assertEquals(1, $query->count());
    }

    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testGetName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testSetName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
