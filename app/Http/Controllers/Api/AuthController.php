<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use Smc\Services\RegisterService;
use Smc\Repositories\Register\RegisterBySiteRepository;
use Smc\Repositories\Register\RegisterByFacebookRepository;
use Smc\Repositories\Register\VRegisterRepository;

use Smc\Services\LoginService;
use Smc\Repositories\Login\LoginRepository;
use Smc\Repositories\Login\VLoginRepository;

use Smc\Repositories\Response\ApiResponseRepository;


class AuthController extends BaseController
{
	public function postRegister(Request $request) {		
		$repo = new RegisterService(new VRegisterRepository(), new RegisterBySiteRepository(), new ApiResponseRepository());
		$this->response = $repo->storeRegisterData($request);

        return response()->json($this->response, $this->response->code);
	}

	public function postRegisterThroughFacebook(Request $request) {

		$repo = new RegisterService(new VRegisterRepository(), new RegisterByFacebookRepository(), new ApiResponseRepository());
		$this->response = $repo->storeRegisterData($request);

        return response()->json($this->response, $this->response->code);
	}
	
    public function postLogin(Request $request) {
		$repo = new LoginService(new VLoginRepository(), new LoginRepository(), new ApiResponseRepository());
		$this->response = $repo->postLogin($request);

		return response()->json($this->response, $this->response->code);
	}
}
