<?php namespace Smc\Repositories\Register;
use Smc\Interfaces\IValidate;
use Validator;

class VRegisterRepository implements IValidate
{
	public function validate($request)
	{
		$validator = Validator::make($request->all(), [
            'FirstName'     => 'required|min:2|max:30',
            'LastName'      => 'required|min:2|max:30',
            'Email' 		=> 'required|email|unique:Users,Email',
            'MobileNo' 		=> 'required|min:11|max:11|unique:Users,MobileNo',
            'Password' 		=> 'required|min:6|max:100'
		]);

        if ($validator->fails()) {					
			return $validator->errors();
        }

        return false;
	}
}