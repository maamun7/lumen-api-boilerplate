<?php namespace Smc\Services;

class BaseService {

	protected $repo;
	protected $response;
	protected $val;
	protected string $validateMsg = 'Failed to pass validation !';
	protected string $ok = 'OK';
	protected string $success = 'SUCCESS';
	protected string $fail = 'FAILED';
	protected int $successCode = 200;
	protected int $errorCode = 400;

}