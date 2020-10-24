<?php namespace Smc\Services;

use Smc\Interfaces\IValidate;
use Smc\Interfaces\Login\ILogin;
use Smc\Interfaces\Response\IApiResponse;

class LoginService extends BaseService {
	
	public function __construct(IValidate $validate, ILogin $repo, IApiResponse $response) {
		$this->val = $validate;
		$this->repo = $repo;
		$this->response = $response;
	}
	
	public function postLogin($request) {

		if ($errors = $this->val->validate($request)) {			
			return $this->response->error($this->errorCode, $this->validateMsg, $errors, $this->fail);
		}

		$res = $this->repo->checkCredential($request);

		if ($res) {
			return $this->response->success($this->successCode, 'Successfully logged in !', $res, $this->ok);
		}

		return $this->response->error($this->errorCode, 'Does\'t match email or password !', null, $this->fail);
	}
}
