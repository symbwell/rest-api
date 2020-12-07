<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('surname') ?></th>
                    <th><?= $this->Paginator->sort('age') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('salary') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->id) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->surname) ?></td>
                    <td><?= h($user->age) ?></td>
                    <td><?= h($user->phone) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td><?= $this->Number->format($user->salary) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
