<?php namespace Smc\Services;

use Smc\Interfaces\IValidate;
use Smc\Interfaces\Register\IRegister;
use Smc\Interfaces\Response\IApiResponse;

class RegisterService extends BaseService {
	
	public function __construct(IValidate $validate, IRegister $repo, IApiResponse $response) {
		$this->val = $validate;
		$this->repo = $repo;
		$this->response = $response;
	}
	
	public function storeRegisterData($request) {

		if ($validate = $this->val->validate($request)) {			
			return $this->response->error($this->errorCode, $this->validateMsg, $validate, $this->fail);
		}

		$res = $this->repo->storeData($request);

		if ($res) {
			return $this->response->success($this->successCode, 'User has been created successfully !', $res, $this->ok);
		}

		return $this->response->error($this->errorCode, 'Unable to save register data !', null, $this->fail);
	}
}
