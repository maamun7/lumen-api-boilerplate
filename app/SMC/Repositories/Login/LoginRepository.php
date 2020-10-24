<?php namespace Smc\Repositories\Login;
use Illuminate\Support\Facades\Hash;
use Smc\Interfaces\Login\ILogin;

class LoginRepository implements ILogin
{
	public function checkCredential($request)
	{
        $email = $request->Email;
        $password = $request->Password;
		$userInfo = $this->getUserInfo($email);

		if (!$userInfo) {
			return false;
		}

        if (Hash::check($password, $userInfo->Password)) {
			$userInfo->Profile = $this->getProfileData($userInfo->Id);			
			return $userInfo;
		}

		return false;
	}
	
	private function getUserInfo($email): ?object {
		return \App\Models\User::select(
			'Id',
			'Username',
			'MobileNo',
			'Email',
			'Password'
		)
		->where('Email', $email)
		->first();
	}

	private function getProfileData($useId): ?object {
		return \App\Models\Profile::select(
			'Id',
			'FirstName',
			'LastName',
			'AltMobileNo',
			'Occupation',
			'DateOfBirth',
			'ProfilePhoto',
			'CoverPhoto',
			'CompletePercentage'
		)
		->where('UserId', $useId)
		->first();
	}
}