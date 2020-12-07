<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Error\Exception\ValidationErrorException;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 255)
            ->allowEmptyString('surname');

        $validator
            ->scalar('age')
            ->maxLength('age', 255)
            ->allowEmptyString('age');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 2048)
            ->allowEmptyString('password');

        $validator
            ->decimal('salary')
            ->allowEmptyString('salary');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getName(string $id): ?string
    {
        return $this->get($id)->get('name');
    }

    /**
     * @param string $id
     * @param string $name
     * @return \App\Model\Entity\User
     */
    public function setName(string $id, string $name): User
    {
        $user = $this->get($id);
        $user->set('name', $name);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getSurname(string $id): ?string
    {
        return $this->get($id)->get('surname');
    }

    /**
     * @param string $id
     * @param string $name
     * @return \App\Model\Entity\User
     */
    public function setSurname(string $id, string $surname): User
    {
        $user = $this->get($id);
        $user->set('surname', $surname);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getAge(string $id): ?string
    {
        return $this->get($id)->get('age');
    }

    /**
     * @param string $id
     * @param string $age
     * @return \App\Model\Entity\User
     */
    public function setAge(string $id, string $age): User
    {
        $user = $this->get($id);
        $user->set('age', $age);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getSalary(string $id): ?string
    {
        return $this->get($id)->get('salary');
    }

    /**
     * @param string $id
     * @param string $salary
     * @return \App\Model\Entity\User
     */
    public function setSalary(string $id, string $salary): User
    {
        $user = $this->get($id);
        $user->set('salary', $salary);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getPhone(string $id): ?string
    {
        return $this->get($id)->get('phone');
    }

    /**
     * @param string $id
     * @param string $phone
     * @return \App\Model\Entity\User
     */
    public function setPhone(string $id, string $phone): User
    {
        $user = $this->get($id);
        $user->set('phone', $phone);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getEmail(string $id): ?string
    {
        return $this->get($id)->get('email');
    }

    /**
     * @param string $id
     * @param string $email
     * @return \App\Model\Entity\User
     */
    public function setEmail(string $id, string $email): User
    {
        $user = $this->get($id);
        $user->set('email', $email);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }

    /**
     * @param string $id
     * @return string|null
     */
    public function getPassword(string $id): ?string
    {
        return $this->get($id)->get('password');
    }

    public function setPassword(string $id, string $password): User
    {
        $user = $this->get($id);
        $user->set('password', $password);

        if (!$this->save($user)) {
            throw new ValidationErrorException($user);
        }

        return $user;
    }
}
