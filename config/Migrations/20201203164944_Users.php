<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'uuid');

        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => '255',
                'null' => true
            ]);

        $table
            ->addColumn('surname', 'string', [
                'default' => null,
                'limit' => '255',
                'null' => true
            ]);

        $table
            ->addColumn('age', 'string', [
                'default' => null,
                'limit' => '255',
                'null' => true
            ]);

        $table
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => '255',
                'null' => true
            ]);

        $table
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => '255',
                'null' => true
            ]);

        $table
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => '2048',
                'null' => true
            ]);

        $table
            ->addColumn('salary', 'decimal', [
                'default' => null,
                'limit' => '11',
                'null' => true
            ]);

        $table
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => true
            ]);

        $table
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => true
            ]);

        $table->create();
    }
}
