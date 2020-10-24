<?php namespace Smc\Repositories\Response;

use Smc\Interfaces\Response\IApiResponse;

 class ApiResponseRepository implements IApiResponse {

    public function success(int $code, string $msg, $data = null, string $status = 'OK', string $description = '') : object
    {
        return (object) array(
            'status'        => $status,
            'success'       => true,
            'code'          => $code,
            'message'       => $msg,
            'description'   => $description,
            'data'          => $data,
            'errors'        => null,
            'api'           => ['version' => '1.0']
        );
    }

    public function error(int $code, string $msg, $errors = null, string $status = 'ERROR', string $description = '') : object
    {
        return (object) array(
            'status'    => $status,
            'success'   => false,
            'code'      => $code,
            'message'   => $msg,
            'description' => $description,
            'data'      => null,
            'errors'    => $this->getFormattedErrors($code, $errors, $msg),
            'api'       => ['version' => '1.0']
        );
    }

    private function getFormattedErrors(int $code, $errors, string $reason = '', string $description = '') : object
    {
        if ($description == '') {
            $description = $reason;
        }

        return (object) [
            'fields'        => $errors,
            'error_as_string' => $this->getErrorAsString($errors),
            'reason'        => $reason,
            'description'   => $description,
            'error_code'    => $code,
            'link'          => ''
        ];
    }

    private function getErrorAsString($errors) : string {
        $errorString ="";

        foreach ((array) $errors as $error) {

            if (is_array($error)) {
                foreach ($error as $e) {
                    $errorString .= $e[0] . ",";
                }

                $errorString = substr($errorString, 0, -1);
                break;

            } else {
                $errorString .= "";
            }
        }

        return $errorString;
    }
}