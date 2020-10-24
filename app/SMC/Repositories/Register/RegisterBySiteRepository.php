<?php namespace Smc\Repositories\Register;
use Smc\Interfaces\Register\IRegister;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterBySiteRepository implements IRegister
{
	public function storeData($request)
	{
		DB::beginTransaction();
		
        try {
			$user = new \App\Models\User();
			$user->Email 	 = $request->Email;
			$user->Password  = Hash::make($request->Password);
			$user->MobileNo  = $request->MobileNo;
			$user->Status    = 1;
			$user->UserType  = 1;
			$user->CreatedAt = date('Y-m-d H:i:s');
			$user->CreatedBy = 0;
			$user->save();			

            $profileData = [
                'FirstName'   => $request->FirstName,
                'LastName'    => $request->LastName,         
                'UserId'      => $user->id,    
                'CreatedBy'   => 0,
                'CountryId'   => 1,
                'CreatedAt'   => date('Y-m-d H:i:s')
            ];

            $profile = new \App\Models\Profile($profileData);
            $profile->save();

        } catch (\Exception $e) {
			DB::rollback();
			
            return false;
        }

        DB::commit();

        $user->Profile = $profile;
		unset($user->Password);

        return $user;
	}
}