<?php namespace Smc\Interfaces\Response;

interface IApiResponse {

    public function success(int $code, string $msg, $data = null, string $status = 'OK', string $description = '') : object;    

    public function error(int $code, string $msg, $errors = null, string $status = 'ERROR', string $description = '') : object;
}