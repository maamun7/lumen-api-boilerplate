<?php namespace Smc\Repositories\Login;
use Smc\Interfaces\IValidate;
use Validator;

class VLoginRepository implements IValidate
{
	public function validate($request)
	{
		$validator = Validator::make($request->all(), [
            'Email' 		=> 'required|email',
            'Password' 		=> 'required'
		]);

        if ($validator->fails()) {					
			return $validator->errors();
        }

        return false;
	}
}