<?php
declare(strict_types=1);

namespace App\Error\Exception;

use Cake\Datasource\EntityInterface;
use Cake\Http\Exception\HttpException;

class ValidationErrorException extends HttpException
{
    protected $_validationErrors;

    /**
     * ValidationErrorException constructor.
     *
     * @param \Cake\Datasource\EntityInterface $entity
     * @param null $message
     * @param int $code
     */
    public function __construct(EntityInterface $entity, $message = null, $code = 422)
    {
        $this->_validationErrors = $entity->getErrors();

        if ($message === null) {
            $message = 'A validation error occurred.';
        }

        parent::__construct($message, $code);
    }

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->_validationErrors;
    }

}
