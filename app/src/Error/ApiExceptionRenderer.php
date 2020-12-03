<?php
declare(strict_types=1);

namespace App\Error;

use App\Error\Exception\ValidationErrorException;
use Cake\Error\ExceptionRenderer;

class ApiExceptionRenderer extends ExceptionRenderer
{
    /**
     * @param \App\Error\Exception\ValidationErrorException $exception
     * @return \Cake\Http\Response
     */
    public function validationError(ValidationErrorException $exception): \Cake\Http\Response
    {
        $code = $this->_code($exception);
        $message = $this->_message($exception);
        $method = $this->_method($exception);
        $template = $this->_template($exception, $method, $code);

        $response = $this->controller->getResponse();
        foreach ((array)$exception->responseHeader() as $key => $value) {
            $response = $response->withHeader($key, $value);
        }

        $viewVars = [
            'message' => $message,
            'code' => $code,
            '_serialize' => [
                'message',
                'code',
            ]
        ];

        $this->controller->set($viewVars);

        return $this->_outputMessage($template);
    }
}
